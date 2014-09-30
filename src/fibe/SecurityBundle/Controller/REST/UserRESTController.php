<?php
/**
 * 
 * @author benoitddlp
 */
namespace fibe\SecurityBundle\Controller\REST;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\UserBundle\Form\Model\ChangePassword;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Exception\AccountStatusException;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;

/**
 * Class UserRESTController
 * @package fibe\SecurityBundle\REST\Controller
 */
class UserRESTController extends Controller
{
  /**
   * handle the signup form and sends a confirmation mail.
   * @Route("/signup", name="security_signup")
   */
  public function signupAction()
  {
    $form = $this->container->get('fos_user.registration.form');
    $formHandler = $this->container->get('fos_user.registration.form.handler');
    $confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');

    $process = $formHandler->process($confirmationEnabled);
    if ($process) {
      $user = $form->getData();
      $this->container->get('fibe.UserService')->post($user);
      $this->getDoctrine()->getManager()->flush();

      $response = new Response('Register_success');

      if ($confirmationEnabled) {
        $this->authenticateUser($user, $response);
      }

      return $response;
    }else
    {
      //investigate on failure...
      $userManager = $this->container->get('fos_user.user_manager');
      if(null != $userManager->findUserByUsername($form->getData()->getUsername()))
      {
        throw new \Exception('Register_username_in_use_error');
      }else if(null != $userManager->findUserByEmail($form->getData()->getEmail()))
      {
        throw new \Exception('Register_email_in_use_error');
      }
    }
    throw new \Exception('Register_error');
  }

  /**
   * change the password of an user.
   * If the password is still random, don't ask for it.
   * @Route("/user/changepwd", name="security_changepwd")
   */
  public function changePwdAction(Request $request)
  {
    /** @var \fibe\SecurityBundle\Entity\User $user */
    $user = $this->getUser();
    echo $user->getPlainPassword();
    if (!is_object($user) || !$user instanceof UserInterface) {
      throw new AccessDeniedException('This user does not have access to this section.');
    }

    $form = $this->container->get('fos_user.change_password.form');
    $formHandler = $this->container->get('fos_user.change_password.form.handler');

    if($user->isRandomPwd())
    {
      //TODO : find a better way to do this ?
      $plainPassword = json_decode($request->getContent(),true)['fos_user_change_password']['plainPassword'];
      if($plainPassword['first'] !== $plainPassword['second'])
      {
        throw new \Exception('Changepwd_mismatch_error');
      }
      $userManager = $this->container->get('fos_user.user_manager');
      $user->setPlainPassword($plainPassword['first']);
      $user->setRandomPwd(false);
      $user->setConfirmationToken(null);
      $userManager->updateUser($user);

      $response = new Response($this->container->get('jms_serializer')->serialize( $user, $request->getRequestFormat()));
      $response->headers->set('Content-Type', 'application/json');
      $this->authenticateUser($user, $response);
      return $response;
    }
    else
    {
      $process = $formHandler->process($user);
      if ($process) {

        return new Response('Changepwd_success');
      }
    }

    throw new \Exception('Changepwd_error');
  }

  /**
   * Redirect to the frontend api confirmation page.
   * @Rest\Get("/confirm", name="fos_user_registration_confirm")
   * @Rest\QueryParam(name="token", requirements=".{32,64}", description="The confirmation token from user email provider.")
   */
  public function confirmRedirectAction(Request $request, ParamFetcherInterface $paramFetcher)
  {
    $token = $paramFetcher->get('token');
    return $this->redirect($this->generateUrl('fibe_frontend_front_index') . '#/confirm/' . $token);
  }

  /**
   * Receive the confirmation token from user email provider,enable login the user and .
   * @Rest\Post("/user/confirm", name="security_confirm")
   * @Rest\View
   */
  public function confirmAction(Request $request)
  {
    $token = $request->request->get('token');
    $userManager = $this->container->get('fos_user.user_manager');
    /** @var \fibe\SecurityBundle\Entity\User $user */
    $user = $userManager->findUserByConfirmationToken($token);

    if (null === $user || strlen($token) == 0)
    {
      throw new NotFoundHttpException(sprintf('The user with confirmation token "%s" does not exist', $token));
    }
    //let the user a way to login if he doesn't change his password
    if(!$user->isRandomPwd())
    {
      $user->setConfirmationToken(null);
    }
    $user->setEnabled(true);
    $user->setLastLogin(new \DateTime());
    $userManager->updateUser($user);

    $response = new Response($this->container->get('jms_serializer')->serialize( $user, $request->getRequestFormat()));
    $response->headers->set('Content-Type', 'application/json');
    $this->authenticateUser($user, $response);
    return $response;
  }

  /**
   * Authenticate a user with Symfony Security
   *
   * @param \FOS\UserBundle\Model\UserInterface $user
   * @param \Symfony\Component\HttpFoundation\Response $response
   */
    protected function authenticateUser(UserInterface $user, Response $response)
    {
        try {
            $this->container->get('fos_user.security.login_manager')->loginUser(
                $this->container->getParameter('fos_user.firewall_name'),
                $user,
                $response);
        } catch (AccountStatusException $ex) {
            // We simply do not authenticate users which do not pass the user
            // checker (not enabled, expired, etc.).
        }
    }
}
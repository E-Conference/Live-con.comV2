<?php
/**
 * 
 * @author benoitddlp
 */
namespace fibe\SecurityBundle\Controller\REST;

//TODO edit username mail and pwd,
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccountStatusException;

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

      $response = new Response('Register_success');

      if ($confirmationEnabled) {
        $this->authenticateUser($user, $response);
      }

      return $response;
    }else{
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
   * Receive the confirmation token from user email provider, login the user.
   * @Rest\Post("/user/confirm", name="security_confirm")
   * @Rest\View
   */
  public function confirmAction(Request $request)
  {
    $token = $request->request->get('token');
    $userManager = $this->container->get('fos_user.user_manager');
    $user = $userManager->findUserByConfirmationToken($token);

    if (null === $user || strlen($token) == 0) {
      throw new NotFoundHttpException(sprintf('The user with confirmation token "%s" does not exist', $token));
    }
    $user->setConfirmationToken(null);
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
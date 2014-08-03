<?php

namespace fibe\RestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\UserBundle\Model\UserInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use fibe\SecurityBundle\Entity\User;
use FOS\RestBundle\Controller\FOSRestController;


class ApiController  extends FOSRestController
{

    protected function loginUser(UserInterface $user)
    {

        $security = $this->get('security.context');
        $providerKey = $this->container->getParameter('fos_user.firewall_name');
        $roles = $user->getRoles();
        $token = new UsernamePasswordToken($user, null, $providerKey, $roles);
        $token->setUser($user);
        $security->
        $security->setToken($token);
    }

    protected function logoutUser()
    {
        $security = $this->get('security.context');
        $token = new AnonymousToken(null, new User());
        $security->setToken($token);
        $this->get('session')->invalidate();
    }

    protected function checkUserPassword(UserInterface $user, $password)
    {
        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        if(!$encoder){
            return false;
        }
        return $encoder->isPasswordValid($user->getPassword(), $password, $user->getSalt());
    }

    /**
   	 * @Rest\View()
     */
    public function postLoginAction()
    { 
        $serializer = $this->container->get('jms_serializer');
        $request = $this->container->get('request');
      	$user = $serializer->deserialize( $request->getContent(), 'fibe\SecurityBundle\Entity\User', 'json');

        $username = $user->getUserName();
        $password = $user->getPassword();

        $um = $this->get('fos_user.user_manager');
        $user = $um->findUserBy(array("username" => $username));
        if(!$user){
            $user = $um->findUserByEmail($username);
        }

        if(!$user instanceof UserInterface){
            throw new NotFoundHttpException("User not found");
        }
        if(!$this->checkUserPassword($user, $password)){
            throw new AccessDeniedException("Wrong password");
        }

        try {
            $this->container->get('fos_user.security.login_manager')->loginUser(
                $this->container->getParameter('fos_user.firewall_name'),
                $user,
                new Response());
        } catch (AccountStatusException $ex) {
            // We simply do not authenticate users which do not pass the user
            // checker (not enabled, expired, etc.).
        }

         $this->loginUser($user);

        // $user->setSessionId($this->container->get("session")->getId());

        return $user;
    }

    /**
     * @Route("/api/user/logout.{_format}", name="api_user_logout")
     * @Template(engine="serializer")
     */
    public function logoutAction()
    {
        $this->logoutUser();
        return array('success'=>true);
    }
}
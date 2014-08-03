<?php

namespace fibe\RestBundle\Listener;

use FOS\UserBundle\Model\UserManagerInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Translation\TranslatorInterface;


class AuthenticationHandler implements AuthenticationSuccessHandlerInterface, AuthenticationFailureHandlerInterface
{

  protected $router;
  protected $security;
  protected $userManager;
  protected $translator;

  public function __construct(RouterInterface $router, SecurityContext $security, UserManagerInterface  $userManager, TranslatorInterface $translator, SerializerInterface $jms_serializer)
  {
    $this->router = $router;
    $this->security = $security;
    $this->userManager = $userManager;
    $this->translator = $translator;
    $this->jms_serializer = $jms_serializer;

  }
  public function onAuthenticationSuccess(Request $request, TokenInterface $token) {
    $result = array(
      'success'   => true,
      'user'      => $this->jms_serializer->serialize( $token->getUser(), 'json'),
      'targetUrl' => $request->getSession()->get('_security.main.target_path')
    );
    $response = new Response(json_encode($result));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
  }
  public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
    $result = array(
      'success' => false,
      'error' => true,
      'message' => $this->translator->trans($exception->getMessage(), array(), 'FOSUserBundle')
    );
    $response = new Response(json_encode($result));
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }
}
<?php

namespace fibe\CommunityBundle\Controller\REST;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;

/**
 * SocialServiceAccount rest controller.
 */
class SocialServiceAccountRESTController extends FOSRestController
{

  const ENTITY_CLASSNAME = "fibe\\ContentBundle\\Entity\\SocialServiceAccount";
  const FORM_CLASSNAME = "fibe\\ContentBundle\\Form\\SocialServiceAccount";


  /**
   * Lists all SocialServiceAccount entities.
   * @Rest\Get("/socialServiceAccounts")
   * @Rest\View
   * @Rest\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing pages.")
   * @Rest\QueryParam(name="limit", requirements="\d+", default="10", description="How many entity to return.")
   * @Rest\QueryParam(name="query", requirements=".{1,128}", nullable=true, description="the query to search.")
   * @Rest\QueryParam(name="order", nullable=true, array=true, description="an array of order.")
   * @Rest\QueryParam(name="filters", nullable=true, array=true, description="an array of filters.")
   */
  public function getSocialServiceAccountsAction(Request $request, ParamFetcherInterface $paramFetcher)
  {
    return $this->get('fibe.rest.crudhandler')->getAll(
      $this::ENTITY_CLASSNAME,
      $paramFetcher
    );

  }

  /**
   * @Rest\Get("/socialServiceAccounts/{id}")
   **/
  public function getSocialServiceAccountAction($id)
  {

    return $this->get('fibe.rest.crudhandler')->get(
      $this::ENTITY_CLASSNAME,
      $id
    );
  }


  /**
   * Creates a new SocialServiceAccount from the submitted data.
   *
   * @Rest\Post("/socialServiceAccounts",name="api_socialServiceAccount_post")
   *
   * @param Request $request the request object
   *
   * @return array|\FOS\RestBundle\View\View
   */
  public function postSocialServiceAccountAction(Request $request)
  {

    return $this->get('fibe.rest.crudhandler')->processForm(
      $request,
      $this::ENTITY_CLASSNAME,
      $this::FORM_CLASSNAME,
      'POST'
    );

  }


  /**
   * Put action
   * @Rest\Put("/socialServiceAccounts/{id}")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function putSocialServiceAccountAction(Request $request, $id)
  {

    return $this->get('fibe.rest.crudhandler')->processForm(
      $request,
      $this::ENTITY_CLASSNAME,
      $this::FORM_CLASSNAME,
      'PUT', $id
    );

  }


  /**
   * Patch action
   * @Rest\Patch("/socialServiceAccounts/{id}")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function patchSocialServiceAccountAction(Request $request, $id)
  {
    return $this->get('fibe.rest.crudhandler')->processForm(
      $request,
      $this::ENTITY_CLASSNAME,
      $this::FORM_CLASSNAME,
      'PATCH', $id
    );
  }


  /**
   * Delete action
   * @Rest\Delete("/socialServiceAccounts/{id}")
   *
   * @var integer $id Id of the entity
   */
  public function deleteSocialServiceAccountAction($id)
  {

    return $this->get('fibe.rest.crudhandler')->delete(
      $this::ENTITY_CLASSNAME,
      $id
    );;
  }

}
        
<?php

namespace fibe\CommunityBundle\Controller\REST;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;

/**
 * Organization rest controller.
 */
class OrganizationRESTController extends FOSRestController
{

  const ENTITY_CLASSNAME = "fibe\\CommunityBundle\\Entity\\Organization";
  const FORM_CLASSNAME = "fibe\\CommunityBundle\\Form\\OrganizationType";


  /**
   * Lists all Organization entities.
   * @Rest\Get("/organizations", name="community_organizations_all")
   * @Rest\View
   * @Rest\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing pages.")
   * @Rest\QueryParam(name="limit", requirements="\d+", default="70", description="How many entity to return.")
   * @Rest\QueryParam(name="query", requirements=".{1,64}", nullable=true, description="the query to search.")
   * @Rest\QueryParam(name="order", nullable=true, array=true, description="an array of order.")
   */
  public function getOrganizationsAction(Request $request, ParamFetcherInterface $paramFetcher)
  {
    return $this->get('fibe.rest.crudhandler')->getAll(
      $this::ENTITY_CLASSNAME,
      $paramFetcher
    );
  }

  /**
   * @Rest\Get("/organizations/{id}", name="community_organizations_get")
   **/
  public function getOrganizationAction($id)
  {

    return $this->get('fibe.rest.crudhandler')->get(
      $this::ENTITY_CLASSNAME,
      $id
    );
  }


  /**
   * Creates a new organization from the submitted data.
   *
   * @Rest\Post("/organizations",name="community_organizations_post")
   *
   * @param Request $request the request object
   *
   * @return array|\FOS\RestBundle\View\View
   */
  public function postOrganizationAction(Request $request)
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
   * @Rest\Put("/organizations/{id}", name="community_organizations_put")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function putOrganizationAction(Request $request, $id)
  {

    return $this->get('fibe.rest.crudhandler')->processForm(
      $request,
      $this::ENTITY_CLASSNAME,
      $this::FORM_CLASSNAME,
      'PUT',$id
    );
  }


  /**
   * Patch action
   * @Rest\Patch("/organizations/{id}", name="community_organizations_patch")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function patchOrganizationAction(Request $request, $id)
  {
    return $this->get('fibe.rest.crudhandler')->processForm(
      $request,
      $this::ENTITY_CLASSNAME,
      $this::FORM_CLASSNAME,
      'PATCH',$id
    );
  }




  /**
   * Delete action
   * @Rest\Delete("/organizations/{id}", name="community_organizations_delete")
   *
   * @var integer $id Id of the entity
   */
  public function deleteOrganizationAction($id)
  {

    return $this->get('fibe.rest.crudhandler')->delete(
      $this::ENTITY_CLASSNAME,
      $id
    );

  }

}
        
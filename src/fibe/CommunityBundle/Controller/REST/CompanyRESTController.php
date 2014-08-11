<?php

namespace fibe\CommunityBundle\Controller\REST;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;

/**
 * Company rest controller.
 */
class CompanyRESTController extends FOSRestController
{

  const ENTITY_CLASSNAME = "fibe\\CommunityBundle\\Entity\\Company";
  const FORM_CLASSNAME = "fibe\\CommunityBundle\\Form\\CompanyType";


  /**
   * Lists all Company entities.
   * @Rest\Get("/companies", name="community_companies_all")
   * @Rest\View
   * @Rest\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing pages.")
   * @Rest\QueryParam(name="limit", requirements="\d+", default="70", description="How many entity to return.")
   * @Rest\QueryParam(name="query", requirements=".{2,64}", nullable=true, description="the query to search.")
   * @Rest\QueryParam(name="order", nullable=true, array=true, description="the query to search.")
   */
  public function getCompaniesAction(Request $request, ParamFetcherInterface $paramFetcher)
  {
    return $this->get('fibe.rest.crudhandler')->getAll(
      $this::ENTITY_CLASSNAME,
      $paramFetcher
    );
  }

  /**
   * @Rest\Get("/companies/{id}", name="community_companies_get")
   **/
  public function getCompanyAction($id)
  {

    return $this->get('fibe.rest.crudhandler')->get(
      $this::ENTITY_CLASSNAME,
      $id
    );
  }


  /**
   * Creates a new company from the submitted data.
   *
   * @Rest\Post("/companies",name="community_companies_post")
   *
   * @param Request $request the request object
   *
   * @return array|\FOS\RestBundle\View\View
   */
  public function postCompanyAction(Request $request)
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
   * @Rest\Put("/companies/{id}", name="community_companies_put")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function putCompanyAction(Request $request, $id)
  {

    return $this->get('fibe.rest.crudhandler')->processForm(
      $request,
      $this::ENTITY_CLASSNAME,
      $this::FORM_CLASSNAME,
      'PUT'
    );
  }


  /**
   * Patch action
   * @Rest\Patch("/companies/{id}", name="community_companies_patch")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function patchCompanyAction(Request $request, $id)
  {
    return $this->get('fibe.rest.crudhandler')->processForm(
      $request,
      $this::ENTITY_CLASSNAME,
      $this::FORM_CLASSNAME,
      'PATCH'
    );
  }




  /**
   * Delete action
   * @Rest\Delete("/companies/{id}", name="community_companies_delete")
   *
   * @var integer $id Id of the entity
   */
  public function deleteCompanyAction($id)
  {

    return $this->get('fibe.rest.crudhandler')->delete(
      $this::ENTITY_CLASSNAME,
      $id
    );

  }

}
        
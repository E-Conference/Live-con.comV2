<?php

namespace fibe\EventBundle\Controller\REST;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;

/**
 * Category rest controller.
 */
class CategoryRESTController extends FOSRestController
{

  const ENTITY_CLASSNAME = "fibe\\EventBundle\\Entity\\Category";
  const FORM_CLASSNAME = "fibe\\EventBundle\\Form\\CategoryType";


  /**
   * Lists all Category entities.
   * @Rest\Get("/categories", name="schedule_categories_all")
   * @Rest\View
   * @Rest\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing pages.")
   * @Rest\QueryParam(name="limit", requirements="\d+", default="10", description="How many entity to return.")
   * @Rest\QueryParam(name="query", requirements=".{2,128}", nullable=true, description="the query to search.")
   * @Rest\QueryParam(name="order", nullable=true, array=true, description="the query to search.")
   */
  public function getCategoriesAction(Request $request, ParamFetcherInterface $paramFetcher)
  {
    return $this->get('fibe.rest.crudhandler')->getAll(
      $this::ENTITY_CLASSNAME,
      $paramFetcher
    );

  }

  /**
   * @Rest\Get("/categories/{id}", name="schedule_categories_get")
   **/
  public function getCategoryAction($id)
  {

    return $this->get('fibe.rest.crudhandler')->get(
      $this::ENTITY_CLASSNAME,
      $id
    );
  }


  /**
   * Creates a new Category from the submitted data.
   *
   * @Rest\Post("/categories", name="schedule_categories_post")
   *
   * @param Request $request the request object
   *
   * @return array|\FOS\RestBundle\View\View
   */
  public function postCategoryAction(Request $request)
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
   * @Rest\Put("/categories/{id}", name="schedule_categories_put")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function putCategoryAction(Request $request, $id)
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
   * @Rest\Patch("/categories/{id}", name="schedule_categories_patch")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function patchCategoryAction(Request $request, $id)
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
   * @Rest\Delete("/categories/{id}", name="schedule_categories_delete")
   *
   * @var integer $id Id of the entity
   */
  public function deleteCategoryAction($id)
  {

    return $this->get('fibe.rest.crudhandler')->delete(
      $this::ENTITY_CLASSNAME,
      $id
    );
;
  }

}
        
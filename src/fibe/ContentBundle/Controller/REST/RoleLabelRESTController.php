<?php

namespace fibe\ContentBundle\Controller\REST;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * RoleLabel rest controller.
 */
class RoleLabelRESTController extends FOSRestController
{

  const ENTITY_CLASSNAME = "fibe\\ContentBundle\\Entity\\RoleLabel";
  const FORM_CLASSNAME = "fibe\\ContentBundle\\Form\\RoleLabelType";


  /**
   * Lists all RoleLabel entities.
   * @Rest\Get("/roleLabels", name="content_roleLabels_all")
   * @Rest\View
   * @Rest\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing pages.")
   * @Rest\QueryParam(name="limit", requirements="\d+", default="10", description="How many entity to return.")
   * @Rest\QueryParam(name="query", requirements=".{1,128}", nullable=true, description="the query to search.")
   * @Rest\QueryParam(name="order", nullable=true, array=true, description="an array of order.")
   */
  public function getRoleLabelsAction(Request $request, ParamFetcherInterface $paramFetcher)
  {
    return $this->get('fibe.rest.crudhandler')->getAll(
      $this::ENTITY_CLASSNAME,
      $paramFetcher
    );

  }

  /**
   * @Rest\Get("/roleLabels/{id}", name="content_roleLabels_get")
   **/
  public function getRoleLabelAction($id)
  {

    return $this->get('fibe.rest.crudhandler')->get(
      $this::ENTITY_CLASSNAME,
      $id
    );
  }


  /**
   * Creates a new RoleLabel from the submitted data.
   *
   * @Rest\Post("/roleLabels", name="content_roleLabels_post")
   *
   * @param Request $request the request object
   *
   * @return array|\FOS\RestBundle\View\View
   */
  public function postRoleLabelAction(Request $request)
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
   * @Rest\Put("/roleLabels/{id}", name="content_roleLabels_put")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function putRoleLabelAction(Request $request, $id)
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
   * @Rest\Patch("/roleLabels/{id}", name="content_roleLabels_patch")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function patchRoleLabelAction(Request $request, $id)
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
   * @Rest\Delete("/roleLabels/{id}", name="content_roleLabels_delete")
   *
   * @var integer $id Id of the entity
   */
  public function deleteRoleLabelAction($id)
  {

    return $this->get('fibe.rest.crudhandler')->delete(
      $this::ENTITY_CLASSNAME,
      $id
    );
;
  }

}
        
<?php

namespace fibe\ContentBundle\Controller\REST;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Request;

use fibe\ContentBundle\Entity\Paper;
use fibe\ContentBundle\Form\PaperType;
use fibe\ContentBundle\Form\Filters\PaperFilterType;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;

/**
 * Paper rest controller.
 */
class PaperRESTController extends FOSRestController
{

  const ENTITY_CLASSNAME = "fibe\\ContentBundle\\Entity\\Paper";
  const FORM_CLASSNAME = "fibe\\ContentBundle\\Form\\PaperType";


  /**
   * Lists all Paper entities.
   * @Rest\Get("/papers",name="content_papers_all")
   * @Rest\View
   * @Rest\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing pages.")
   * @Rest\QueryParam(name="limit", requirements="\d+", default="10", description="How many entity to return.")
   * @Rest\QueryParam(name="query", requirements=".{1,128}", nullable=true, description="the query to search.")
   * @Rest\QueryParam(name="order", nullable=true, array=true, description="an array of order.")
   */
  public function getPapersAction(Request $request, ParamFetcherInterface $paramFetcher)
  {
    return $this->get('fibe.rest.crudhandler')->getAll(
      $this::ENTITY_CLASSNAME,
      $paramFetcher
    );

  }

  /**
   * @Rest\Get("/papers/{id}",name="content_papers_get")
   **/
  public function getPaperAction($id)
  {

    return $this->get('fibe.rest.crudhandler')->get(
      $this::ENTITY_CLASSNAME,
      $id
    );
  }


  /**
   * Creates a new Paper from the submitted data.
   *
   * @Rest\Post("/papers",name="content_papers_post")
   *
   * @param Request $request the request object
   *
   * @return array|\FOS\RestBundle\View\View
   */
  public function postPaperAction(Request $request)
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
   * @Rest\Put("/papers/{id}",name="content_papers_put")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function putPaperAction(Request $request, $id)
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
   * @Rest\Patch("/papers/{id}",name="content_papers_patch")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function patchPaperAction(Request $request, $id)
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
   * @Rest\Delete("/papers/{id}",name="content_papers_delete")
   *
   * @var integer $id Id of the entity
   */
  public function deletePaperAction($id)
  {

    return $this->get('fibe.rest.crudhandler')->delete(
      $this::ENTITY_CLASSNAME,
      $id
    );
;
  }

}
        
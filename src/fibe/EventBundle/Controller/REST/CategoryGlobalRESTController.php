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
class CategoryGlobalRESTController extends FOSRestController
{

    const ENTITY_CLASSNAME = "fibe\\EventBundle\\Entity\\CategoryGlobal";
    const FORM_CLASSNAME = "fibe\\EventBundle\\Form\\CategoryGlobalType";


    /**
     * Lists all Category entities.
     * @Rest\Get("/categoryGlobals", name="schedule_category_globals_all")
     * @Rest\View
     * @Rest\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing pages.")
     * @Rest\QueryParam(name="limit", requirements="\d+", default="10", description="How many entity to return.")
     * @Rest\QueryParam(name="query", requirements=".{1,128}", nullable=true, description="the query to search.")
     * @Rest\QueryParam(name="order", nullable=true, array=true, description="an array of order.")
     */
    public function getCategoryGlobalsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        return $this->get('fibe.rest.crudhandler')->getAll(
            $this::ENTITY_CLASSNAME,
            $paramFetcher
        );
    }


}
        
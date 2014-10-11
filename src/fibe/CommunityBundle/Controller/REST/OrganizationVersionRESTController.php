<?php

namespace fibe\CommunityBundle\Controller\REST;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController;

/**
 * Organization person version rest controller.
 */
class OrganizationVersionRESTController extends FOSRestController
{

    const ENTITY_CLASSNAME = "fibe\\CommunityBundle\\Entity\\OrganizationVersion";
    const FORM_CLASSNAME = "fibe\\CommunityBundle\\Form\\OrganizationVersionType";


    /**
     * Lists all organization person versions entities filtered by conference.
     * @Rest\Get("/mainEvents/{confId}/organizationVersions", name="schedule_organization_versions_all_by_conference")
     * @Rest\View
     * @Rest\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing pages.")
     * @Rest\QueryParam(name="limit", requirements="\d+", default="10", description="How many entity to return.")
     * @Rest\QueryParam(name="query", requirements=".{1,128}", nullable=true, description="the query to search.")
     * @Rest\QueryParam(name="order", nullable=true, array=true, description="an array of order.")
     * @Rest\QueryParam(name="filters", nullable=true, array=true, description="an array of filters.")
     */
    public function getOrganizationVersionByConferenceAction(Request $request, ParamFetcherInterface $paramFetcher, $confId)
    {
        return $this->get('fibe.rest.crudhandler')->getAll(
            $this::ENTITY_CLASSNAME,
            $paramFetcher,
            $confId
        );
    }

    /**
     * Lists all Organization person versions entities.
     * @Rest\Get("/organizationVersions", name="community_organization_versions_all")
     * @Rest\View
     * @Rest\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing pages.")
     * @Rest\QueryParam(name="limit", requirements="\d+", default="70", description="How many entity to return.")
     * @Rest\QueryParam(name="query", requirements=".{1,64}", nullable=true, description="the query to search.")
     * @Rest\QueryParam(name="order", nullable=true, array=true, description="an array of order.")
     * @Rest\QueryParam(name="filters", nullable=true, array=true, description="an array of filters.")
     */
    public function getOrganizationVersionsAction(Request $request, ParamFetcherInterface $paramFetcher)
    {
        return $this->get('fibe.rest.crudhandler')->getAll(
            $this::ENTITY_CLASSNAME,
            $paramFetcher
        );
    }

    /**
     * @Rest\Get("/organizationVersions/{id}", name="community_organization_versions_get")
     **/
    public function getOrganizationVersionAction($id)
    {

        return $this->get('fibe.rest.crudhandler')->get(
            $this::ENTITY_CLASSNAME,
            $id
        );
    }


    /**
     * Creates a new organization person version from the submitted data.
     *
     * @Rest\Post("/organizationVersions",name="community_organization_versions_post")
     *
     * @param Request $request the request object
     *
     * @return array|\FOS\RestBundle\View\View
     */
    public function postOrganizationVersionAction(Request $request)
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
     * @Rest\Put("/organizationVersions/{id}", name="community_organization_versions_put")
     * @var Request $request
     * @var integer $id Id of the entity
     * @return mixed
     */
    public function putOrganizationVersionAction(Request $request, $id)
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
     * @Rest\Patch("/organizationVersions/{id}", name="community_organization_versions_patch")
     * @var Request $request
     * @var integer $id Id of the entity
     * @return mixed
     */
    public function patchOrganizationVersionAction(Request $request, $id)
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
     * @Rest\Delete("/organizationVersions/{id}", name="community_organization_versions_delete")
     *
     * @var integer $id Id of the entity
     */
    public function deleteOrganizationVersionAction($id)
    {

        return $this->get('fibe.rest.crudhandler')->delete(
            $this::ENTITY_CLASSNAME,
            $id
        );

    }

}
        
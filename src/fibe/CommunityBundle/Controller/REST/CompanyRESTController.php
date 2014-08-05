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
   * @Rest\Get("/companies")
   * @Rest\View
   * @Rest\QueryParam(name="offset", requirements="\d+", nullable=true, description="Offset from which to start listing pages.")
   * @Rest\QueryParam(name="limit", requirements="\d+", default="10", description="How many entity to return.")
   */
  public function getCompaniesAction(Request $request, ParamFetcherInterface $paramFetcher)
  {
    return $this->get('fibe.rest.crudhandler')->getAll(
      $this::ENTITY_CLASSNAME,
      $paramFetcher
    );

//    $em = $this->getDoctrine()->getManager();
//    $entities = $em->getRepository('fibeCommunityBundle:Company')->findAll();
//
//    return $entities;
//
  }

  /**
   * @Rest\Get("/companies/{id}")
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
   * @Rest\Post("/companies",name="api_company_post")
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

    /*
    $entity = new Company();
    $user = $this->getUser();

    $serializer = $this->container->get('jms_serializer');
    $company = $serializer->deserialize($request->getContent(), ' fibe\CommunityBundle\Entity\Company', 'json');

    $form = $this->createForm(new CompanyType(), $entity);
    $form->bind($request);


    if ($form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($company);
      $em->flush();


      return $this->redirectView(
        $this->generateUrl(
          'fibe_community_rest_companyrest_getcompany',
          array('id' => $company->getId())
//          ,Codes::HTTP_CREATED
        )
      );
    }

    return array(
      'form' => $form,
    );*/
  }


  /**
   * Put action
   * @Rest\Put("/companies/{id}")
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

//
//
//    $serializer = $this->container->get('jms_serializer');
//    $entity = $serializer->deserialize($request->getContent(), ' fibe\CommunityBundle\Entity\Company', 'json');
//
//    $em = $this->getDoctrine()->getManager();
//
//
//    $company = $em->getRepository('fibeCommunityBundle:Company')->find($id);
//
//
//    $form = $this->createForm(new CompanyType(), $company);
//    $form->bind($entity);
//
//    if ($form->isValid())
//    {
//      $em = $this->getDoctrine()->getManager();
//      $em->persist($form->getData());
//      $em->flush();
//
//      return $this->view(null, Codes::HTTP_NO_CONTENT);
//    }
//
//    return array(
//      'form' => $form,
//    );

  }


  /**
   * Patch action
   * @Rest\Patch("/companies/{id}")
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
   * Put action
   * @Rest\Delete("/companies/{id}")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return View|array
   */
  /*public function putCompanyAction(Request $request, $id)
  {

      $user=$this->getUser();

      $serializer = $this->container->get('jms_serializer');
      $entity = $serializer->deserialize( $request->getContent(), ' fibe\CommunityBundle\Entity\Company', 'json');
      if($entity instanceof Company == false){

          return $this->view(null, Codes::HTTP_NOT_MODIFIED);

       }

         $em = $this->getDoctrine()->getManager();
         $em->merge($entity);
         $em->flush();

     return $this->view(null, Codes::HTTP_NO_CONTENT);

  }*/


  /**
   * Delete action
   * @Rest\Delete("/companies/{id}")
   *
   * @var integer $id Id of the entity
   */
  public function deleteCompanyAction($id)
  {

    return $this->get('fibe.rest.crudhandler')->delete(
      $this::ENTITY_CLASSNAME,
      $id
    );
//    $em = $this->getDoctrine()->getManager();
//    $company = $em->getRepository('fibeCommunityBundle:Company')->find($id);
//
//    $em = $this->getDoctrine()->getManager();
//    $em->remove($company);
//    $em->flush();
//
//    return $this->view(null, Codes::HTTP_NO_CONTENT);
  }

}
        
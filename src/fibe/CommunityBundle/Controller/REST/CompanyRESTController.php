<?php

namespace fibe\CommunityBundle\Controller\REST;

use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Patch;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Component\HttpFoundation\Request;
use fibe\CommunityBundle\Entity\Company;
use fibe\CommunityBundle\Form\CompanyType;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;

use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;

/**
 * Company rest controller.
 */
class CompanyRESTController extends FOSRestController
{

  const CLASSNAME = "fibe\\CommunityBundle\\Entity\\Company";


  /**
   * Lists all Company entities.
   * @Get("/companies")
   * @View
   */
  public function getCompaniesAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $entities = $em->getRepository('fibeCommunityBundle:Company')->findAll();

    return $entities;
  }

  /**
   * @Get("/companies/{id}", name="api_company_get")
   **/
  public function getCompanyAction($id)
  {

    $em = $this->getDoctrine()->getManager();
    //$company = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'Company',$id);
    $company = $em->getRepository('fibeCommunityBundle:Company')->find($id);
    if (!is_object($company))
    {
      throw $this->createNotFoundException();
    }

    return $company;
  }


  /**
   * Creates a new company from the submitted data.
   *
   * @Post("/companies",name="api_company_post")
   *
   * @param Request $request the request object
   *
   * @return array|\FOS\RestBundle\View\View
   */
  public function postCompanyAction(Request $request)
  {

    return $this->get('fibe.rest.crudhandler')->processForm(
      $this::CLASSNAME,
      $request,
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
   * @Put("/companies/{id}")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function putCompanyAction(Request $request, $id)
  {

    return $this->get('fibe.rest.crudhandler')->processForm(
      $this::CLASSNAME,
      $request,
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
   * @Patch("/companies/{id}")
   * @var Request $request
   * @var integer $id Id of the entity
   * @return mixed
   */
  public function patchCompanyAction(Request $request, $id)
  {

    return $this->get('fibe.rest.crudhandler')->processForm(
      $this::CLASSNAME,
      $request,
      'PATCH'
    );
  }

    /**
   * Put action
   * @Delete("/companies/{id}")
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
   *
   * @var integer $id Id of the entity
   * @return View
   */
  public function deleteCompanyAction($id)
  {
    $em = $this->getDoctrine()->getManager();
    $company = $em->getRepository('fibeCommunityBundle:Company')->find($id);

    $em = $this->getDoctrine()->getManager();
    $em->remove($company);
    $em->flush();

    return $this->view(null, Codes::HTTP_NO_CONTENT);
  }

}
        
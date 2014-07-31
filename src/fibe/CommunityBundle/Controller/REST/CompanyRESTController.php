<?php

namespace fibe\CommunityBundle\Controller\REST;

use Symfony\Component\HttpFoundation\Request;
use fibe\CommunityBundle\Entity\Company;
use fibe\CommunityBundle\Form\CompanyType;

use Symfony\Component\Security\Core\Exception\AccessDeniedException; 
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;

/**
 * Company controller.
 *
 *
 */
class CompanyRESTController extends FOSRestController
{
  
  /**
   *@Rest\View()
  **/
   public function getCompanyAction($id){

          $em = $this->getDoctrine()->getManager();
          //$Company = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'Company',$id);
          $Company = $em->getRepository('fibeCommunityBundle:Company')->find($id);
             if(!is_object($Company)){
                throw $this->createNotFoundException();
                }
            return $Company;
    }


    /**
     * Lists all Company entities.
     * @Rest\View()
     */
    public function getCompaniesAction(Request $request)
    {
        
        //Authorization Verification conference datas manager
        $user=$this->getUser();

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('fibeCommunityBundle:Company')->findAll();
   
        return  $entities;
    }


/**
     * Creates a new note from the submitted data.
     *
     *
     * @Rest\View()
     *
     * @param Request $request the request object
     *
     * @return FormTypeInterface|RouteRedirectView
     */
  public function postCompanyAction(Request $request)
  {
      $entity = new Company();
      $user=$this->getUser();

      $serializer = $this->container->get('jms_serializer');
      $company = $serializer->deserialize( $request->getContent(), ' fibe\CommunityBundle\Entity\Company', 'json');

      $form = $this->createForm(new CompanyType(), $entity);
      $form->bind($request);
  

     if ($form->isValid()) {
         $em = $this->getDoctrine()->getManager();
         $em->persist($company);
         $em->flush();

        // return $this->redirect($this->generateUrl('apiREST_get_company', array('id' => $company->getId())));
          return $this->redirectView(
                   $this->generateUrl(
                       'apiREST_get_company',
                       array('id' => $company->getId())
                       ),
                   Codes::HTTP_CREATED
                   );
      }

      return array(
          'form' => $form,
      );
  }
  

  /**
 * Put action
 * @var Request $request
 * @var integer $id Id of the entity
 * @return View|array
 */
public function putCompanyAction(Request $request, $id)
{
    

    $serializer = $this->container->get('jms_serializer');
    $entity = $serializer->deserialize( $request->getContent(), ' fibe\CommunityBundle\Entity\Company', 'json');
    
    $em = $this->getDoctrine()->getManager();
    
    
    $company =  $em->getRepository('fibeCommunityBundle:Company')->find($id);
    

    $form = $this->createForm(new CompanyType(), $company);
    $form->bind($entity);

    if($form->isValid()){
        $em = $this->getDoctrine()->getManager();
        $em->persist($form->getData());
        $em->flush();

        return $this->view(null, Codes::HTTP_NO_CONTENT);
    }
    
    return array(
          'form' => $form,
      );

}

 /**
 * Put action
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
 * @var integer $id Id of the entity
 * @return View
 */
public function deleteCompanyAction($id)
{
    $em = $this->getDoctrine()->getManager();
    $company =  $em->getRepository('fibeCommunityBundle:Company')->find($id);

    $em = $this->getDoctrine()->getManager();
    $em->remove($company);
    $em->flush();

    return $this->view(null, Codes::HTTP_NO_CONTENT);
}

}
        
<?php

namespace fibe\CommunityBundle\Controller\REST;

use Symfony\Component\HttpFoundation\Request;
use fibe\CommunityBundle\Entity\Person;
use fibe\CommunityBundle\Form\PersonType;

use Symfony\Component\Security\Core\Exception\AccessDeniedException; 
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Util\Codes;

/**
 * Organization controller.
 *
 *
 */
class PersonRESTController extends FOSRestController
{
  
  /**
   *@Rest\View()
  **/

   public function getPersonAction($id){

          $em = $this->getDoctrine()->getManager();
          $person = $em->getRepository('fibeCommunityBundle:Person')->find($id);
             if(!is_object($person)){
                throw $this->createNotFoundException();
                }
            return $person;
    }


    


}
        
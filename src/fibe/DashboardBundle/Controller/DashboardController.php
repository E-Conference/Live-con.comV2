<?php

namespace fibe\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use fibe\ConferenceBundle\Entity\MainEvent;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Dashboard Controller
 *
 * @Route("/Dashboard")
 */
class DashboardController extends Controller
{
  /**
   * @Route("/" , name="dashboard_index")
   * @Template()
   */
  public function indexAction()
  {
    $entities = $this->get('fibe_security.acl_entity_helper')->getEntitiesACL('VIEW', 'MainEvent');

    return array('conferences' => $entities);
  }


  /**
   * @Route("{id}/enter" , name="dashboard_enter_conference")
   */
  public function enterConferenceAction($id)
  {

    $em = $this->getDoctrine()->getManager();
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'MainEvent', $id);

    $user = $this->getUser();
    $user->setMainEvent($entity);
    $em->persist($user);
    $em->flush();

    return $this->redirect($this->generateUrl('schedule_conference_show'));

  }


}

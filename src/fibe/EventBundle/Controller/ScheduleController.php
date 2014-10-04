<?php
namespace fibe\EventBundle\Controller;

use fibe\EventBundle\Form\ConfEventType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use fibe\EventBundle\Entity\Event;
use fibe\ContentBundle\Entity\Role;

use fibe\ContentBundle\Form\RoleType;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


/**
 * Schedule Controller
 *
 * @Route("/schedule")
 */
class ScheduleController extends Controller
{

  /**
   *  Affiche la vue fullcalendar
   * @Route("/", name="schedule_view")
   * @Template()
   */
  public function scheduleAction()
  {
    // Si on peut récupérer un objet MainEvent, l'utilisateur à le droit...
    $granted = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'MainEvent');

    $user = $this->getUser();
    $em = $this->getDoctrine();
   // $mainEvent = $user->getCurrentMainEvent();

    //filters
    $categories = $em->getRepository('fibeEventBundle:Category')->getOrdered();
  //  $locations = $user->getCurrentMainEvent()->getLocations();
   // $topics = $user->getCurrentMainEvent()->getTopics();

    return array(
      //'currentMainEvent' => $mainEvent,
      'authorized'  => isset($granted), // Si il existe une conference
      'categories'  => $categories,
      //'locations'   => $locations,
      //'topics'      => $topics,
    );
  }


  /**
   * Add & update
   * @Route("/getEvents", name="schedule_view_event_get")
   */
  public function getEventsAction(Request $request)
  {
    //Authorization Verification conference sched manager
    if ($this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'MainEvent') == null)
    {
      throw new AccessDeniedException('Action not authorized !');
    }

    //TODO secure that (injection & csrf)

    $em = $this->getDoctrine()->getManager();

    $getData = $request->query;
    $methodParam = $getData->get('method', '');
    $postData = $request->request->all();

    $mainEvent = $this->getUser()->getCurrentMainEvent();

    $event = null;
    if ($methodParam == "add")
    {
      $event = new Event();
    }
    else if ($methodParam == "update")
    {
      $event = $em->getRepository('fibeEventBundle:Event')->find($postData['id']);
    }

    //resource(s)
    $resConfig = array(
      "location" => array(
        "name"       => "Location",
        "methodName" => "setLocation",
      )
    );
    if (isset($postData['resourceId']))
    {
      $resource = $postData['resourceId'];
      $currentRes = $resConfig[$postData['currentRes']];

      $repo = $em->getRepository('fibeEventBundle:' . $currentRes["name"]);
      if (!$repo)
      {
        $repo = $em->getRepository('fibeEventBundle:' . $currentRes["name"]);
      }

      if ($repo)
      {
        if ($resource == 0)
        {
          $value = null;
        }
        else
        {
          $value = $repo->find($resource);
        }
        call_user_func_array(array($event, $currentRes["methodName"]), array($value));

      }
      else
      {
        //resource repo not found
      }
    }

    $event->setMainEvent($mainEvent);
    //fix windows "double time specification" bug...
    $start = $this->parseDate($postData['start']);
    $end = $this->parseDate($postData['end']);
    $event->setStartAt($start);
    $event->setEndAt($end);
    if(isset($postData['parent']) && $postData['parent']!= "")
    {
      $parent = $em->getRepository('fibeEventBundle:Event')->find($postData['parent']);
      $event->setParent($parent);
    }else
    {
      $event->setParent($mainEvent);
    }
    $event->setLabel($postData['title']);
    $event->setIsAllDay($postData['allDay'] == "true");

    $em->persist($event);
    $em->flush();

    $JSONArray = array();
    $JSONArray['id'] = $event->getId();
    $JSONArray['IsSuccess'] = true;
    $JSONArray['Msg'] = $methodParam . " success";

    //update mainEvent
    if ($mainEvent->fitChildrenDate() == true)
    {
      $em->persist($mainEvent);
      $JSONArray['mainEvent'] = array(
        "start" => $mainEvent->getStartAt()->format(\DateTime::ISO8601),
        "end"   => $mainEvent->getEndAt()->format(\DateTime::ISO8601)
      );
    }
    $em->flush();

    $response = new Response(json_encode($JSONArray));
    $response->headers->set('Content-Type', 'application/json');

    return $response;
  }


  /**
   * Patch  : Fix windows "double time specification" bug...
   *
   * @param $dateStr
   *
   * @return \DateTime
   */
  function parseDate($dateStr)
  {
    return new \DateTime(
      strlen(strstr($dateStr, '(')) < 9
        ? $dateStr
        : strstr($dateStr, " (", true)
    );
  }


  /**
   * @Route("/editEvents", name="schedule_view_event_edit")
   * @Template()
   */
  public function scheduleEditAction(Request $request)
  {
    $granted = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'MainEvent');
    if (!isset($granted))
    {
      throw new AccessDeniedException('Action not authorized !');
    }

    $getData = $request->query;
    $id = $getData->get('id', '');

    $em = $this->getDoctrine()->getManager();
    //The object must belong to the current conf
    $mainEvent = $this->getUser()->getCurrentMainEvent();
    $entity = $em->getRepository('fibeEventBundle:Event')->findOneBy(array('conference' => $mainEvent, 'id' => $id));
    if (!$entity)
    {
      throw $this->createNotFoundException('Unable to find ConfEvent entity.');
    }

    $role = new Role();
    $roleForm = $this->createForm(new RoleType($this->getUser()), $role);
    $editForm = $this->createForm(new ConfEventType($this->getUser(), $entity), $entity);

    $papersForSelect = $this->getUser()->getCurrentMainEvent()->getPapers()->toArray();
    $form_paper = $this->createFormBuilder($entity)
      ->add(
        'papers',
        'entity',
        array(
          'class'    => 'fibeContentBundle:Paper',
          'property' => 'title',
          'required' => false,
          'choices'  => $papersForSelect,
          'multiple' => false
        )
      )
      ->getForm();

    $topicsForSelect = $this->getUser()->getCurrentMainEvent()->getTopics()->toArray();
    $form_topic = $this->createFormBuilder($entity)
      ->add(
        'topics',
        'entity',
        array(
          'class'    => 'fibeContentBundle:Topic',
          'required' => false,
          'property' => 'name',
          'choices'  => $topicsForSelect,
          'multiple' => false
        )
      )
      ->getForm();

    $deleteForm = $this->createDeleteForm($id);

    return $this->render(
      'fibeEventBundle:Schedule:scheduleEdit.html.twig',
      array(
        'entity'      => $entity,
        'edit_form'   => $editForm->createView(),
        'role_form'   => $roleForm->createView(),
        'paper_form'  => $form_paper->createView(),
        'topic_form'  => $form_topic->createView(),
        'delete_form' => $deleteForm->createView(),
        'authorized'  => isset($granted),
      )
    );

  }


  /* @TODO REFACTO : not used, to delete
   * //  /**
   * //   * ajax version of event edit controller
   * //   * @Route("/{id}/updateEvents", name="schedule_view_event_update")
   * //   */
//  public function scheduleUpdateAction(Request $request, $id)
//  {
//    $granted = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'MainEvent');
//    if (!isset($granted))
//    {
//      throw new AccessDeniedException('Action not authorized !');
//      $this->container->get('session')->getFlashBag()->add(
//        'error',
//        'You not authorized to modify the schedule'
//      );
//    }
//
//    $em = $this->getDoctrine()->getManager();
//
//    $JSONArray = array();
//
//    //The object must belong to the current conf
//    $mainEvent = $this->getUser()->getCurrentMainEvent();
//    $entity = $em->getRepository('fibeWWWConfBundle:ConfEvent')->findOneBy(
//      array('conference' => $mainEvent, 'id' => $id)
//    ); //@TODO error
//    if (!$entity)
//    {
//      throw $this->createNotFoundException('Unable to find ConfEvent entity.');
//    }
//
//    if ($entity)
//    {
//
//      $JSONArray['Data'] = $id;
//
//      $editForm = $this->createForm(new EventType(), $entity); //@TODO error
//      $editForm->bind($request);
//      if ($editForm->isValid())
//      {
//        $em->persist($entity);
//        $em->flush();
//
//        $JSONArray['IsSuccess'] = true;
//        $JSONArray['Msg'] = "update succses";
//      }
//      else
//      {
//        $JSONArray['IsSuccess'] = false;
//        $JSONArray['Msg'] = "update failed";
//      }
//    }
//    else
//    {
//
//      $JSONArray['IsSuccess'] = false;
//      $JSONArray['Msg'] = "entity not found";c
//    }
//
//    $response = new Response(json_encode($JSONArray));
//    $response->headers->set('Content-Type', 'application/json');
//
//    return $response;
//  }




  /**
   * @TODO comment
   *
   * @param $id
   *
   * @return \Symfony\Component\Form\Form
   */
  private function createDeleteForm($id)
  {
    return $this->createFormBuilder(array('id' => $id))
      ->add('id', 'hidden')
      ->getForm();
  }


}





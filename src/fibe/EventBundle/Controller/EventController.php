<?php

namespace fibe\EventBundle\Controller;

use fibe\ContentBundle\Entity\Role;
use fibe\ContentBundle\Form\RoleType;
use fibe\EventBundle\Form\Filters\EventFilterType;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use fibe\EventBundle\Entity\Event;
use fibe\EventBundle\Form\EventType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Event controller.
 *
 * @Route("/event")
 */
class EventController extends Controller
{
  /**
   * Lists all Event entities.
   * @Route("/",name="event_event")
   * @Template()
   */
  public function indexAction(Request $request)
  {
    $entities = $this->get('fibe_security.acl_entity_helper')->getEntitiesACL('VIEW', 'Event');

    $adapter = new ArrayAdapter($entities);
    $pager = new PagerFanta($adapter);
    $pager->setMaxPerPage($this->container->getParameter('max_per_page'));

    try
    {
      $pager->setCurrentPage($request->query->get('page', 1));
    } catch (NotValidCurrentPageException $e)
    {
      throw new NotFoundHttpException();
    }

    //Form Filter
    $filters = $this->createForm(new EventFilterType($this->getUser()));


    return array(
      'pager' => $pager,
      'filters_form' => $filters->createView()
    );
  }

  /**
   * Filter confevent
   * @Route("/filter", name="event_event_filter")
   */
  public function filterAction(Request $request)
  {

    $em = $this->getDoctrine()->getManager();

    $conf = $this->getUser()->getCurrentMainEvent();
    //Filters
    $filters = $this->createForm(new EventFilterType($this->getUser()));
    $filters->submit($request);

    if ($filters->isValid())
    {
      // bind values from the request

      $entities = $em->getRepository('fibeEventBundle:Event')->filtering($filters->getData(), $conf);
      $nbResult = count($entities);

      //Pager
      $adapter = new ArrayAdapter($entities);
      $pager = new PagerFanta($adapter);
      $pager->setMaxPerPage($this->container->getParameter('max_per_page'));
      try
      {
        $pager->setCurrentPage($request->query->get('page', 1));
      } catch (NotValidCurrentPageException $e)
      {
        throw new NotFoundHttpException();
      }

      return $this->render(
        'fibeEventBundle:Event:list.html.twig',
        array(
          'pager' => $pager,
          'nbResult' => $nbResult,
        )
      );
    }
  }

  /**
   * Creates a new Event entity.
   * @Route("/create", name="event_event_create")
   */
  public function createAction(Request $request)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('CREATE', 'Event');

    $form = $this->createForm(new EventType([], $entity));

    $form->bind($request);

    if ($form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $entity->setMainEvent($this->getUser()->getCurrentMainEvent());
      $em->persist($entity);

      $em->flush();

      //$this->get('fibe_security.acl_entity_helper')->createACL($entity,MaskBuilder::MASK_OWNER);

      return $this->redirect($this->generateUrl('event_event_show', array('id' => $entity->getId())));
    }

    return $this->render(
      'fibeEventBundle:Event:new.html.twig',
      array(
        'entity' => $entity,
        'form' => $form->createView(),
      )
    );
  }

  /**
   * Displays a form to create a new Event entity.
   * @Route("/new",name="event_event_new")
   * @Template()
   */
  public function newAction()
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('CREATE', 'Event');

    //From the index I can create event with all categories
    $categoriesLevel = array("levels" => array(1, 2, 3));

    $form = $this->createForm(new EventType($categoriesLevel), $entity);


    return $this->render(
      'fibeEventBundle:Event:new.html.twig',
      array(
        'entity' => $entity,
        'form' => $form->createView(),
        'categoriesLevel' => $categoriesLevel,
      )
    );
  }

  /**
   * Displays a form to create a new Event entity.
   * @Route("session/{id}/addEvent",name="event_addeventensession")
   * @Template()
   */
  public function addEventInSessionAction(Request $request, $id)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('CREATE', 'Event');
    $em = $this->getDoctrine()->getManager();
    //From the index I can create event with all categories
    $categoriesLevel = array("levels" => array(3));

    $form = $this->createForm(new EventType($categoriesLevel), $entity);

    $form->bind($request);

    if ($form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $entity->setParent($em->getRepository('fibeEventBundle:Event')->find($id));
      $em->persist($entity);

      $em->flush();

      //$this->get('fibe_security.acl_entity_helper')->createACL($entity,MaskBuilder::MASK_OWNER);

      return $this->redirect($this->generateUrl('event_event_show', array('id' => $id)));
    }


    return $this->render(
      'fibeEventBundle:Event:new.html.twig',
      array(
        'entity' => $entity,
        'form' => $form->createView(),
        'categoriesLevel' => $categoriesLevel,
      )
    );
  }

  /**
   * Finds and displays a Event entity.
   * @Route("/{id}/show", name="event_event_show")
   * @Template()
   */

  public function showAction($id)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'Event', $id);

    $deleteForm = $this->createDeleteForm($id);

    return $this->render(
      'fibeEventBundle:Event:show.html.twig',
      array(
        'entity' => $entity,
        'delete_form' => $deleteForm->createView(),

      )
    );
  }

  /**
   * Displays a form to edit an existing Event entity.
   * @Route("/{id}/edit", name="event_event_edit")
   * @Template()
   */
  public function editAction($id)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT', 'Event', $id);

    $editForm = $this->createForm(new EventType($this->getUser()), $entity);
    $deleteForm = $this->createDeleteForm($id);

    $currentMainEvent = $this->getUser()->getCurrentMainEvent();
    $form_role = $this->createForm(new RoleType($this->getUser()), new Role());
    $papersForSelect = $currentMainEvent->getPapers()->toArray();
    $form_paper = $this->createFormBuilder($entity)
      ->add(
        'papers',
        'entity',
        array(
          'class' => 'fibeContentBundle:Paper',
          'property' => 'title',
          'required' => false,
          'multiple' => false,
          'choices' => $papersForSelect,
          'label' => "Select paper"
        )
      )
      ->getForm();

    $topicsForSelect = $currentMainEvent->getTopics()->toArray();
    $form_topic = $this->createFormBuilder($entity)
      ->add(
        'topics',
        'entity',
        array(
          'class' => 'fibeContentBundle:Topic',
          'required' => false,
          'property' => 'name',
          'multiple' => false,
          'choices' => $topicsForSelect,
          'label' => "Select topic"
        )
      )
      ->getForm();

    return $this->render(
      'fibeEventBundle:Event:edit.html.twig',
      array(
        'entity' => $entity,
        'edit_form' => $editForm->createView(),
        'delete_form' => $deleteForm->createView(),
        'role_form' => $form_role->createView(),
        'paper_form' => $form_paper->createView(),
        'topic_form' => $form_topic->createView(),
      )
    );
  }

  /**
   * Edits an existing Event entity.
   * @Route("/{id}/update", name="event_event_update")
   * @Template("fibeEventBundle:Event:edit.html.twig")
   */
  public function updateAction(Request $request, $id)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT', 'Event', $id);

    $form = $this->createForm(new EventType($this->getUser(), $entity), $entity);
    $form->bind($request);

    if ($form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      //If is a main confEvent => have to update the slug conference
      if ($entity->getIsMainEvent())
      {

        $conference = $entity->getMainEvent();
        $conference->slugify();
        $em->persist($conference);
      }

      $em->persist($entity);
      $em->flush();
    }

    return $this->redirect($this->generateUrl('event_event_show', array('id' => $id)));
  }

  /**
   * Deletes a Event entity.
   * @Route("/{id}/delete", name="event_event_delete")
   * @Method({"DELETE","POST"})
   */
  public function deleteAction(Request $request, $id)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('DELETE', 'Event', $id);

    $form = $this->createDeleteForm($id);
    $form->bind($request);

    if ($form->isValid())
    {
      $em = $this->getDoctrine()->getManager();

      $mainEvent = $this->getUser()->getCurrentMainEvent()->getMainEvent();
      if ($mainEvent->getId() == $entity->getId())
      {
        $this->container->get('session')->getFlashBag()->add(
          'error',
          'You cannot delete the Conference Event'
        );

        return $this->redirect($this->generateUrl('event_event_edit', array('id' => $entity->getId())));
      }
      // set orphan children as children of main conf event
      $children = $entity->getChildren();
      foreach ($children
               as
               $child)
      {
        $child->setParent($mainEvent);
        $em->persist($child);
      }
      $this->container->get('session')->getFlashBag()->add(
        'success',
        'Event successfully deleted ! \n Its children have been set as children of the conference'
      );

      $em->remove($entity);
      $em->flush();
    }

    return $this->redirect($this->generateUrl('event_event'));
  }

  /**
   * Creates a form to delete a Event entity by id.
   *
   * @param mixed $id The entity id
   *
   * @return \Symfony\Component\Form\Form
   */
  private function createDeleteForm($id)
  {
    return $this->createFormBuilder(array('id' => $id))
      ->add('id', 'hidden')
      ->getForm();
  }









  /*************************************** topics *****************************************************/

  /**
   * Add topic to a confEvent
   * @Route("/addTopic", name="event_event_addTopic")
   * @Method("POST")
   *
   */
  public function addTopicAction(Request $request)
  {
    $id = $request->request->get('id_entity');
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT', 'Event', $id);

    $id_topic = $request->request->get('id_topic');
    $topic = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'Topic', $id_topic);

    $em = $this->getDoctrine()->getManager();
    //Add paper to the confEvent
    $entity->addTopic($topic);
    //Sauvegarde des données
    $em->persist($entity);
    $em->flush();

    return $this->render(
      'fibeEventBundle:Event:topicRelation.html.twig',
      array(
        'entity' => $entity,
      )
    );
  }


  /**
   * Delete topic of a confEvent
   * @Route("/deleteTopic", name="event_event_deleteTopic")
   * @Method("POST")
   *
   */
  public function deleteTopicAction(Request $request)
  {
    $id = $request->request->get('id_entity');
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT', 'Event', $id);

    $id_topic = $request->request->get('id_topic');
    $topic = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'Topic', $id_topic);

    //Delete topic to the confEvent
    $entity->removeTopic($topic);
    //Sauvegarde des données
    $em = $this->getDoctrine()->getManager();
    $em->persist($entity);
    $em->flush();

    return $this->render(
      'fibeEventBundle:Event:topicRelation.html.twig',
      array(
        'entity' => $entity,
      )
    );
  }


  /*************************************** papers *****************************************************/

  /**
   * Add paper to the confEvent
   * @Route("/addPaper", name="event_event_addPaper")
   * @Method("POST")
   *
   */
  public function addPaperAction(Request $request)
  {
    $id = $request->request->get('id_entity');
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT', 'Event', $id);

    $id_paper = $request->request->get('id_paper');
    $paper = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'Paper', $id_paper);

    //Add paper to the confEvent
    $entity->addPaper($paper);
    //Sauvegarde des données
    $em = $this->getDoctrine()->getManager();
    $em->persist($entity);
    $em->flush();

    return $this->render(
      'fibeEventBundle:Event:paperRelation.html.twig',
      array(
        'entity' => $entity,
      )
    );
  }

  /**
   * Delete paper to a confEvent
   * @Route("/deletePaper", name="event_event_deletePaper")
   * @Method({"DELETE","POST"})
   *
   */
  public function deletePaperAction(Request $request)
  {
    $id = $request->request->get('id_entity');
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT', 'Event', $id);

    $id_paper = $request->request->get('id_paper');
    $paper = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'Paper', $id_paper);

    //Add paper to the confEvent
    $entity->removePaper($paper);
    //Sauvegarde des données
    $em = $this->getDoctrine()->getManager();
    $em->persist($entity);
    $em->flush();

    return $this->render(
      'fibeEventBundle:Event:paperRelation.html.twig',
      array(
        'entity' => $entity,
      )
    );
  }

  /*************************************** person *****************************************************/

  /**
   * Add person to the confEvent
   *
   * @Route( "/addPerson",name="event_event_addPerson")
   * @Method("POST")
   *
   */
  public function addPersonAction(Request $request)
  {
    $id = $request->request->get('id_entity');
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT', 'Event', $id);

    $id_person = $request->request->get('id_person');
    $person = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'Person', $id_person);

    $id_type = $request->request->get('id_type');

    $em = $this->getDoctrine()->getManager();
    $type = $em->getRepository('fibeContentBundle:RoleType')->find($id_type);

    if (!$type)
    {
      throw $this->createNotFoundException('Unable to find type.');
    }

    $role = new Role();
    $role->setPerson($person);
    $role->setType($type);
    $role->setEvent($entity);
    $role->setMainEvent($this->getUser()->getCurrentMainEvent());
    $em->persist($role);

    //Add paper to the confEvent
    $entity->addRole($role);
    //Sauvegarde des données
    $em->persist($entity);
    $em->flush();

    return $this->render(
      'fibeEventBundle:Event:personRelation.html.twig',
      array(
        'entity' => $entity,
      )
    );
  }

  /**
   * Delete person  to a confEvent
   * @Route("/deletePerson", name="event_event_deletePerson")
   * @Method("POST")
   *
   */
  public function deletePersonAction(Request $request)
  {
    $id = $request->request->get('id_entity');
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT', 'Event', $id);

    $em = $this->getDoctrine()->getManager();

    $id_role = $request->request->get('id_role');
    $role = $em->getRepository('fibeContentBundle:Role')->findOneBy(
      array('conference' => $this->getUser()->getCurrentMainEvent(), 'id' => $id_role)
    );

    $em = $this->getDoctrine()->getManager();
    //Add role to the confEvent
    $entity->removeRole($role);
    $em->remove($role);
    //Sauvegarde des données
    $em->persist($entity);
    $em->flush();

    return $this->render(
      'fibeEventBundle:Event:personRelation.html.twig',
      array(
        'entity' => $entity,
      )
    );
  }
}

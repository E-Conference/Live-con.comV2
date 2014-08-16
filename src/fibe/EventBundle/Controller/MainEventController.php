<?php

  namespace fibe\EventBundle\Controller;

  use fibe\EventBundle\Form\MainEventType;
  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


  /**
   * Link controller.
   *
   * @Route("/admin/main_event")
   */
  class MainEventController extends Controller
  {

    /**
     * @Route("/{id}", name="event_mainevent_show")
     *
     * @Template()
     */
    public function showAction(Request $request,$id)
    {
      //$mainEvent = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'MainEvent');
      $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'MainEvent');
      $mainEvent = $this->getUser()->getCurrentMainEvent();
      $form = $this->createForm(new MainEventType($this->getUser()), $mainEvent);

      $request = $this->get('request');
      if ($request->getMethod() == 'POST')
      {
        $form->bind($request);

        if ($form->isValid())
        {
          $em = $this->getDoctrine()->getManager();
          $mainEvent->slugify();
          $em->persist($mainEvent);
          $mainEvent->uploadLogo();
          $em->flush();

          $this->container->get('session')->getFlashBag()->add(
            'success',
            'The conference has been successfully updated'
          );
        }
        else
        {

          $this->container->get('session')->getFlashBag()->add(
            'error',
            'Submition error, please try again.'
          );
        }
      }

      return array(
        'mainEvent' => $mainEvent,
        'form'      => $form->createView(),

      );

    } 


    /**
     * @Route("/{id}/empty", name="event_mainevent_empty")
     */
    public function emptyAction(Request $request, $id)
    {
      $em = $this->getDoctrine()->getManager();

      $conference = $this->get('fibe_security.acl_entity_helper')->getEntityACL('DELETE','MainEvent',$this->getUser()->getCurrentMainEvent());

      //TODO CSRF TOKEN
      // $csrf = $this->get('form.csrf_provider'); //Symfony\Component\Form\Extension\Csrf\CsrfProvider\SessionCsrfProvider 
      // $token = $csrf->generateCsrfToken($intention); //Intention should be empty string, if you did not define it in parameters
      // BOOLEAN $csrf->isCsrfTokenValid($intention, $token); 

      $this->get('fibe.event.MainEventService')->reset($conference);

      $em->flush();

      $this->container->get('session')->getFlashBag()->add(
        'success',
        'conference successfully emptied.'
      );
      return $this->redirect($this->generateUrl('event_mainevent_show'));
    }

    /**
     * Creates a new COnference.
     * @Route("/create", name="event_mainevent_create")
     */
    public function createAction(Request $request)
    {
      //Create the conference
      $this->get('fibe.event.MainEventService')->create();

      return $this->redirect($this->generateUrl('event_mainevent_show'));
    }


    /**
     * @Route("/{id}/delete", name="event_mainevent_delete")
     */
    public function deleteAction(Request $request, $id)
    {
      $em = $this->getDoctrine()->getManager();
      $user = $this->getUser();

      $conference = $this->get('fibe_security.acl_entity_helper')->getEntityACL('DELETE','MainEvent',$id);

      //Change User current Conf
      $user->setcurrentMainEvent(null);
      $em->persist($user);

      $this->get('fibe.event.MainEventService')->delete($conference);

      $this->container->get('session')->getFlashBag()->add(
        'success',
        'conference successfully deleted.'
      );
      return $this->redirect($this->generateUrl('dashboard_index'));
    }

    /*************************** MODULE *************************/

    /**
     * @Route("/module", name="event_mainevent_module")
     *
     * @Template()
     */
    public function moduleAction(Request $request)
    { 
      $module = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT','Module',$this->getUser()->getCurrentMainEvent()->getModule());

      $moduleForm = $this->createForm(new ModuleType(), $module);

      return array( 
        'module'      => $module,
        'module_form' => $moduleForm->createView(),
      );

    }


    /**
     * Edits an existing Module entity.
     * @Route("/module", name="event_module_update")
     *
     * @param Request $request
     * @internal param $id
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
  public function updateModuleAction(Request $request)
  {

    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT','Module',$this->getUser()->getCurrentMainEvent()->getModule());
 
    $editForm = $this->createForm(new ModuleType(), $entity);
    $editForm->bind($request);

    if ($editForm->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($entity);
      $em->flush();

      $this->container->get('session')->getFlashBag()->add(
        'success',
        'The module is succesfully updated'
      );
    }
    else
    {

      $this->container->get('session')->getFlashBag()->add(
        'error',
        'The module cannot be saved'
      );
    }

    return $this->redirect($this->generateUrl('event_mainevent_module'));
  }


  }

<?php

  namespace fibe\EventBundle\Controller;

  use Symfony\Bundle\FrameworkBundle\Controller\Controller;
  use Symfony\Component\HttpFoundation\Request;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
  use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

  use fibe\Bundle\WWWConfBundle\Form\ModuleType;


  /**
   * Link controller.
   *
   * @Route("/admin/main_event")
   */
  class MainEventController extends Controller
  {

    /**
     * @Route("", name="schedule_conference_show")
     *
     * @Template()
     */
    public function showAction(Request $request)
    {
      $mainEvent = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'MainEvent');
      $currentMainEvent = $this->getUser()->getCurrentConf();
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
        'currentMainEvent' => $currentMainEvent,
        'form'      => $form->createView(), 

      );

    } 


    /**
     * @Route("/{id}/empty", name="schedule_conference_empty")
     */
    public function emptyAction(Request $request, $id)
    {
      $em = $this->getDoctrine()->getManager();

      $conference = $this->get('fibe_security.acl_entity_helper')->getEntityACL('DELETE','MainEvent',$this->getUser()->getCurrentMainEvent());

      //TODO CSRF TOKEN
      // $csrf = $this->get('form.csrf_provider'); //Symfony\Component\Form\Extension\Csrf\CsrfProvider\SessionCsrfProvider 
      // $token = $csrf->generateCsrfToken($intention); //Intention should be empty string, if you did not define it in parameters
      // BOOLEAN $csrf->isCsrfTokenValid($intention, $token); 

      $this->get('mainEventService')->reset($conference);

      $em->flush();

      $this->container->get('session')->getFlashBag()->add(
        'success',
        'conference successfully emptied.'
      );
      return $this->redirect($this->generateUrl('schedule_conference_show'));
    }

    /**
     * Creates a new COnference.
     * @Route("/create", name="schedule_conference_create")
     */
    public function createAction(Request $request)
    {
      //Create the conference
      $this->get('mainEventService')->create($this->getUser());

      return $this->redirect($this->generateUrl('schedule_conference_show'));
    }


    /**
     * @Route("/{id}/delete", name="schedule_conference_delete")
     */
    public function deleteAction(Request $request, $id)
    {
      $em = $this->getDoctrine()->getManager();
      $user = $this->getUser();

      $conference = $this->get('fibe_security.acl_entity_helper')->getEntityACL('DELETE','MainEvent',$id);

      //Change User current Conf
      $user->setcurrentMainEvent(null);
      $em->persist($user);

      $this->get('mainEventService')->delete($conference);

      $this->container->get('session')->getFlashBag()->add(
        'success',
        'conference successfully deleted.'
      );
      return $this->redirect($this->generateUrl('dashboard_index'));
    }

    /*************************** MODULE *************************/

    /**
     * @Route("/module", name="schedule_conference_module")
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
   * @Route("/module", name="schedule_module_update")
   *
   * @param Request $request
   * @param         $id
   *
   * @return \Symfony\Component\HttpFoundation\RedirectResponse
   * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
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

    return $this->redirect($this->generateUrl('schedule_conference_module'));
  }


  }

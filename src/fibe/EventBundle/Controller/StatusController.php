<?php

/**
 *
 * @author :  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace fibe\EventBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;

/**
 * Status controller.
 *
 * @Route("/status")
 */
class StatusController extends Controller
{
  /**
   * Lists all Status entities.
   *
   * @Route("/", name="event_status")
   * @Template()
   */
  public function indexAction(Request $request)
  {
    throw new ServiceUnavailableHttpException('Not available yet.');
    $em = $this->getDoctrine()->getManager();
    $entities = $em->getRepository('fibeEventBundle:Status')->findAll();

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

    return array(
      'pager' => $pager,
    );
  }

  /**
   * Finds and displays a Status entity.
   *
   * @Route("/{id}/show", name="event_status_show")
   * @Template()
   */
  public function showAction($id)
  {
    throw new ServiceUnavailableHttpException('Not available yet.');
    $em = $this->getDoctrine()->getManager();
    $entity = $em->getRepository('fibeEventBundle:Status')->find($id);

    if (!$entity)
    {
      throw $this->createNotFoundException('Unable to find Status entity.');
    }


    return array(
      'entity' => $entity,
    );
  }

  /**
   * Displays a form to create a new Status entity.
   *
   * @Route("/new", name="event_status_new")
   * @Template()
   */
  public function newAction()
  {
    throw new ServiceUnavailableHttpException('Not available yet.');
    $entity = new Status();
    $form = $this->createForm(new StatusType(), $entity);

    return array(
      'entity' => $entity,
      'form' => $form->createView(),
    );
  }

  /**
   * Creates a new Status entity.
   *
   * @Route("/create", name="event_status_create")
   * @Method("POST")
   * @Template("fibeEventBundle:Status:new.html.twig")
   */
  public function createAction(Request $request)
  {
    throw new ServiceUnavailableHttpException('Not available yet.');
    $entity = new Status();
    $form = $this->createForm(new StatusType(), $entity);
    $form->bind($request);

    if ($form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($entity);
      $em->flush();

      $this->get('session')->getFlashBag()->add(
        'info',
        $this->get('translator')->trans(
          '%entity%[%id%] has been created',
          array(
            '%entity%' => 'Status',
            '%id%' => $entity->getId()
          )
        )
      );

      return $this->redirect($this->generateUrl('event_status_show', array('id' => $entity->getId())));
    }

    return array(
      'entity' => $entity,
      'form' => $form->createView(),
    );
  }

  /**
   * Displays a form to edit an existing Status entity.
   *
   * @Route("/{id}/edit", name="event_status_edit")
   * @Template()
   */
  public function editAction($id)
  {
    throw new ServiceUnavailableHttpException('Not available yet.');
    $em = $this->getDoctrine()->getManager();
    $entity = $em->getRepository('fibeEventBundle:Status')->find($id);

    if (!$entity)
    {
      throw $this->createNotFoundException('Unable to find Status entity.');
    }

    $editForm = $this->createForm(new StatusType(), $entity);
    $deleteForm = $this->createDeleteForm($id);

    return array(
      'entity' => $entity,
      'edit_form' => $editForm->createView(),
      'delete_form' => $deleteForm->createView(),
    );
  }

  /**
   * Edits an existing Status entity.
   *
   * @Route("/{id}/update", name="event_status_update")
   * @Method("POST")
   * @Template("fibeEventBundle:Status:edit.html.twig")
   */
  public function updateAction(Request $request, $id)
  {
    throw new ServiceUnavailableHttpException('Not available yet.');
    $em = $this->getDoctrine()->getManager();
    $entity = $em->getRepository('fibeEventBundle:Status')->find($id);

    if (!$entity)
    {
      throw $this->createNotFoundException('Unable to find Status entity.');
    }

    $editForm = $this->createForm(new StatusType(), $entity);
    $editForm->bind($request);

    if ($editForm->isValid())
    {
      $em->persist($entity);
      $em->flush();

      $this->get('session')->getFlashBag()->add(
        'info',
        $this->get('translator')->trans(
          '%entity%[%id%] has been updated',
          array(
            '%entity%' => 'Status',
            '%id%' => $entity->getId()
          )
        )
      );

      return $this->redirect($this->generateUrl('event_status_edit', array('id' => $id)));

    }

    return array(
      'entity' => $entity,
      'edit_form' => $editForm->createView(),
    );
  }

  /**
   * Deletes a Status entity.
   *
   * @Route("/{id}/delete", name="event_status_delete")
   * @Method("POST")
   */
  public function deleteAction(Request $request, $id)
  {
    throw new ServiceUnavailableHttpException('Not available yet.');
    $form = $this->createDeleteForm($id);
    $form->bind($request);

    if ($form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $entity = $em->getRepository('fibeEventBundle:Status')->find($id);

      if (!$entity)
      {
        throw $this->createNotFoundException('Unable to find Status entity.');
      }

      $em->remove($entity);
      $em->flush();

      $this->get('session')->getFlashBag()->add(
        'info',
        $this->get('translator')->trans(
          '%entity%[%id%] has been deleted',
          array(
            '%entity%' => 'Status',
            '%id%' => $id
          )
        )
      );
    }

    return $this->redirect($this->generateUrl('event_status'));
  }

  /**
   * Display Status deleteForm.
   *
   * @Template()
   */
  public function deleteFormAction($id)
  {
    throw new ServiceUnavailableHttpException('Not available yet.');
    $em = $this->getDoctrine()->getManager();
    $entity = $em->getRepository('fibeEventBundle:Status')->find($id);

    if (!$entity)
    {
      throw $this->createNotFoundException('Unable to find Status entity.');
    }

    $deleteForm = $this->createDeleteForm($id);

    return array(
      'entity' => $entity,
      'delete_form' => $deleteForm->createView(),
    );
  }

  private function createDeleteForm($id)
  {
    throw new ServiceUnavailableHttpException('Not available yet.');

    return $this->createFormBuilder(array('id' => $id))
      ->add('id', 'hidden')
      ->getForm();
  }
}

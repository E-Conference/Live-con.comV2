<?php

namespace fibe\ContentBundle\Controller;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use fibe\ContentBundle\Entity\Rolelabel;
use fibe\ContentBundle\Form\RolelabelType;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * RoleLabel controller.
 *
 * @Route("/schedule/rolelabel")
 */
class RoleLabelController extends Controller
{
  /**
   * Lists all RoleLabel entities.
   *
   * @Route("/", name="content_rolelabel")
   * @Method("GET")
   * @Template()
   */
  public function indexAction()
  {
    $entities = $this->get('fibe_security.acl_entity_helper')->getEntitiesACL('VIEW', 'Rolelabel');

    return array(
      'entities' => $entities
    );
  }

  /**
   * Creates a new Rolelabel entity.
   *
   * @Route("/", name="content_rolelabel_create")
   * @Method("POST")
   * @Template("fibeContentBundle:Rolelabel:new.html.twig")
   */
  public function createAction(Request $request)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('CREATE', 'Rolelabel');

    $form = $this->createForm(new RolelabelType(), $entity);
    $form->bind($request);

    if ($form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($entity);
      $em->flush();

      return $this->redirect($this->generateUrl('content_rolelabel'));
    }

    return array(
      'entity' => $entity,
      'form' => $form->createView()
    );
  }

  /**
   * Displays a form to create a new Rolelabel entity.
   *
   * @Route("/new", name="content_rolelabel_new")
   * @Method("GET")
   * @Template()
   */
  public function newAction()
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('CREATE', 'Rolelabel');
    $form = $this->createForm(new RolelabelType(), $entity);

    return array(
      'entity' => $entity,
      'form' => $form->createView()
    );
  }

  /**
   * Finds and displays a Rolelabel entity.
   *
   * @Route("/{id}", name="content_rolelabel_show")
   * @Method("GET")
   * @Template()
   */
  public function showAction($id)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'Rolelabel', $id);

    if (!$entity)
    {
      throw $this->createNotFoundException('Unable to find Rolelabel entity.');
    }

    $deleteForm = $this->createDeleteForm($id);

    return array(
      'entity' => $entity,
      'delete_form' => $deleteForm->createView()
    );
  }

  /**
   * Displays a form to edit an existing Rolelabel entity.
   *
   * @Route("/{id}/edit", name="content_rolelabel_edit")
   * @Method("GET")
   * @Template()
   */
  public function editAction($id)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT', 'Rolelabel', $id);

    if (!$entity)
    {
      throw $this->createNotFoundException('Unable to find Rolelabel entity.');
    }

    $editForm = $this->createForm(new RolelabelType(), $entity);
    $deleteForm = $this->createDeleteForm($id);

    return array(
      'entity' => $entity,
      'edit_form' => $editForm->createView(),
      'delete_form' => $deleteForm->createView()
    );
  }

  /**
   * Edits an existing Rolelabel entity.
   *
   * @Route("/{id}", name="content_rolelabel_update")
   * @Method("PUT")
   * @Template("fibeContentBundle:Rolelabel:edit.html.twig")
   */
  public function updateAction(Request $request, $id)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT', 'Rolelabel', $id);

    if (!$entity)
    {
      throw $this->createNotFoundException('Unable to find Rolelabel entity.');
    }

    $deleteForm = $this->createDeleteForm($id);
    $editForm = $this->createForm(new RolelabelType(), $entity);
    $editForm->bind($request);

    if ($editForm->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($entity);
      $em->flush();

      return $this->redirect($this->generateUrl('content_rolelabel'));
    }

    return array(
      'entity' => $entity,
      'edit_form' => $editForm->createView(),
      'delete_form' => $deleteForm->createView()
    );
  }

  /**
   * Deletes a Rolelabel entity.
   *
   * @Route("/{id}", name="content_rolelabel_delete")
   * @Method({"POST", "DELETE"})
   */
  public function deleteAction(Request $request, $id)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('DELETE', 'Rolelabel', $id);

    $form = $this->createDeleteForm($id);
    $form->bind($request);

    if ($form->isValid())
    {
      $em = $this->getDoctrine()->getManager();

      if (!$entity)
      {
        throw $this->createNotFoundException('Unable to find Rolelabel entity.');
      }

      $em->remove($entity);
      $em->flush();
    }

    return $this->redirect($this->generateUrl('content_rolelabel'));
  }

  /**
   * Creates a form to delete a Rolelabel entity by id.
   *
   * @param mixed $id The entity id
   *
   * @return Form The form
   */
  private function createDeleteForm($id)
  {
    return $this->createFormBuilder(array('id' => $id))
      ->add('id', 'hidden')
      ->getForm();
  }
}

<?php

namespace fibe\Bundle\WWWConfBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use fibe\Bundle\WWWConfBundle\Entity\MainEvent;
use fibe\Bundle\WWWConfBundle\Form\MainEventType;

/**
 * MainEvent controller.
 *
 * @Route("/mainevent")
 */
class MainEventController extends Controller
{

    /**
     * Lists all MainEvent entities.
     *
     * @Route("/", name="mainevent")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('fibeWWWConfBundle:MainEvent')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new MainEvent entity.
     *
     * @Route("/", name="mainevent_create")
     * @Method("POST")
     * @Template("fibeWWWConfBundle:MainEvent:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new MainEvent();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mainevent_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a MainEvent entity.
     *
     * @param MainEvent $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MainEvent $entity)
    {
        $form = $this->createForm(new MainEventType(), $entity, array(
            'action' => $this->generateUrl('mainevent_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MainEvent entity.
     *
     * @Route("/new", name="mainevent_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new MainEvent();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a MainEvent entity.
     *
     * @Route("/{id}", name="mainevent_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeWWWConfBundle:MainEvent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MainEvent entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing MainEvent entity.
     *
     * @Route("/{id}/edit", name="mainevent_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeWWWConfBundle:MainEvent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MainEvent entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a MainEvent entity.
    *
    * @param MainEvent $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MainEvent $entity)
    {
        $form = $this->createForm(new MainEventType(), $entity, array(
            'action' => $this->generateUrl('mainevent_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing MainEvent entity.
     *
     * @Route("/{id}", name="mainevent_update")
     * @Method("PUT")
     * @Template("fibeWWWConfBundle:MainEvent:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeWWWConfBundle:MainEvent')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MainEvent entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mainevent_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a MainEvent entity.
     *
     * @Route("/{id}", name="mainevent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('fibeWWWConfBundle:MainEvent')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MainEvent entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mainevent'));
    }

    /**
     * Creates a form to delete a MainEvent entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mainevent_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

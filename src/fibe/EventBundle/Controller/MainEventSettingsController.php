<?php

namespace fibe\Bundle\WWWConfBundle\Controller;

use fibe\EventBundle\Entity\MainEventSettings;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use fibe\Bundle\WWWConfBundle\Form\MainEventSettingsType;

/**
 * MainEventSettings controller.
 *
 * @Route("/maineventsettings")
 */
class MainEventSettingsController extends Controller
{

    /**
     * Lists all MainEventSettings entities.
     *
     * @Route("/", name="maineventsettings")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('fibeEventBundle:MainEventSettings')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new MainEventSettings entity.
     *
     * @Route("/", name="maineventsettings_create")
     * @Method("POST")
     * @Template("fibeEventBundle:MainEventSettings:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new MainEventSettings();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('maineventsettings_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a MainEventSettings entity.
     *
     * @param MainEventSettings $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MainEventSettings $entity)
    {
        $form = $this->createForm(new MainEventSettingsType(), $entity, array(
            'action' => $this->generateUrl('maineventsettings_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MainEventSettings entity.
     *
     * @Route("/new", name="maineventsettings_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new MainEventSettings();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a MainEventSettings entity.
     *
     * @Route("/{id}", name="maineventsettings_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeEventBundle:MainEventSettings')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MainEventSettings entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing MainEventSettings entity.
     *
     * @Route("/{id}/edit", name="maineventsettings_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeEventBundle:MainEventSettings')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MainEventSettings entity.');
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
    * Creates a form to edit a MainEventSettings entity.
    *
    * @param MainEventSettings $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MainEventSettings $entity)
    {
        $form = $this->createForm(new MainEventSettingsType(), $entity, array(
            'action' => $this->generateUrl('maineventsettings_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing MainEventSettings entity.
     *
     * @Route("/{id}", name="maineventsettings_update")
     * @Method("PUT")
     * @Template("fibeEventBundle:MainEventSettings:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeEventBundle:MainEventSettings')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MainEventSettings entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('maineventsettings_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a MainEventSettings entity.
     *
     * @Route("/{id}", name="maineventsettings_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('fibeEventBundle:MainEventSettings')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MainEventSettings entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('maineventsettings'));
    }

    /**
     * Creates a form to delete a MainEventSettings entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('maineventsettings_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

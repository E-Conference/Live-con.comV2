<?php

namespace fibe\CommunityBundle\Controller;

use fibe\CommunityBundle\Entity\AdditionalInformations;
use fibe\CommunityBundle\Form\AdditionalInformationsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * AdditionalInformations controller.
 *
 * @Route("/additionalinformations")
 */
class AdditionalInformationsController extends Controller
{

    /**
     * Lists all AdditionalInformations entities.
     *
     * @Route("/", name="additionalinformations")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('fibeWWWConfBundle:AdditionalInformations')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new AdditionalInformations entity.
     *
     * @Route("/", name="additionalinformations_create")
     * @Method("POST")
     * @Template("fibeWWWConfBundle:AdditionalInformations:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new AdditionalInformations();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('additionalinformations_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a AdditionalInformations entity.
     *
     * @param AdditionalInformations $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(AdditionalInformations $entity)
    {
        $form = $this->createForm(new AdditionalInformationsType(), $entity, array(
            'action' => $this->generateUrl('additionalinformations_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new AdditionalInformations entity.
     *
     * @Route("/new", name="additionalinformations_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new AdditionalInformations();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a AdditionalInformations entity.
     *
     * @Route("/{id}", name="additionalinformations_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeWWWConfBundle:AdditionalInformations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AdditionalInformations entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing AdditionalInformations entity.
     *
     * @Route("/{id}/edit", name="additionalinformations_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeWWWConfBundle:AdditionalInformations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AdditionalInformations entity.');
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
    * Creates a form to edit a AdditionalInformations entity.
    *
    * @param AdditionalInformations $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(AdditionalInformations $entity)
    {
        $form = $this->createForm(new AdditionalInformationsType(), $entity, array(
            'action' => $this->generateUrl('additionalinformations_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing AdditionalInformations entity.
     *
     * @Route("/{id}", name="additionalinformations_update")
     * @Method("PUT")
     * @Template("fibeWWWConfBundle:AdditionalInformations:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeWWWConfBundle:AdditionalInformations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find AdditionalInformations entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('additionalinformations_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a AdditionalInformations entity.
     *
     * @Route("/{id}", name="additionalinformations_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('fibeWWWConfBundle:AdditionalInformations')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find AdditionalInformations entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('additionalinformations'));
    }

    /**
     * Creates a form to delete a AdditionalInformations entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('additionalinformations_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

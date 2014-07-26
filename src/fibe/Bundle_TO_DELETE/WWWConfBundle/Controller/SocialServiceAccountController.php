<?php

namespace fibe\Bundle\WWWConfBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use fibe\Bundle\WWWConfBundle\Entity\SocialServiceAccount;
use fibe\Bundle\WWWConfBundle\Form\SocialServiceAccountType;

/**
 * SocialServiceAccount controller.
 *
 * @Route("/socialserviceaccount")
 */
class SocialServiceAccountController extends Controller
{

    /**
     * Lists all SocialServiceAccount entities.
     *
     * @Route("/", name="socialserviceaccount")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('fibeWWWConfBundle:SocialServiceAccount')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new SocialServiceAccount entity.
     *
     * @Route("/", name="socialserviceaccount_create")
     * @Method("POST")
     * @Template("fibeWWWConfBundle:SocialServiceAccount:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new SocialServiceAccount();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('socialserviceaccount_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a SocialServiceAccount entity.
     *
     * @param SocialServiceAccount $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(SocialServiceAccount $entity)
    {
        $form = $this->createForm(new SocialServiceAccountType(), $entity, array(
            'action' => $this->generateUrl('socialserviceaccount_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new SocialServiceAccount entity.
     *
     * @Route("/new", name="socialserviceaccount_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new SocialServiceAccount();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a SocialServiceAccount entity.
     *
     * @Route("/{id}", name="socialserviceaccount_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeWWWConfBundle:SocialServiceAccount')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialServiceAccount entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing SocialServiceAccount entity.
     *
     * @Route("/{id}/edit", name="socialserviceaccount_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeWWWConfBundle:SocialServiceAccount')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialServiceAccount entity.');
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
    * Creates a form to edit a SocialServiceAccount entity.
    *
    * @param SocialServiceAccount $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(SocialServiceAccount $entity)
    {
        $form = $this->createForm(new SocialServiceAccountType(), $entity, array(
            'action' => $this->generateUrl('socialserviceaccount_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing SocialServiceAccount entity.
     *
     * @Route("/{id}", name="socialserviceaccount_update")
     * @Method("PUT")
     * @Template("fibeWWWConfBundle:SocialServiceAccount:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeWWWConfBundle:SocialServiceAccount')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialServiceAccount entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('socialserviceaccount_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a SocialServiceAccount entity.
     *
     * @Route("/{id}", name="socialserviceaccount_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('fibeWWWConfBundle:SocialServiceAccount')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find SocialServiceAccount entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('socialserviceaccount'));
    }

    /**
     * Creates a form to delete a SocialServiceAccount entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('socialserviceaccount_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

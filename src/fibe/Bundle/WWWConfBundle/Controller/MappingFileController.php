<?php

namespace fibe\Bundle\WWWConfBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use fibe\Bundle\WWWConfBundle\Entity\MappingFile;
use fibe\Bundle\WWWConfBundle\Form\MappingFileType;

/**
 * MappingFile controller.
 *
 * @Route("/mappingfile")
 */
class MappingFileController extends Controller
{

    /**
     * Lists all MappingFile entities.
     *
     * @Route("/", name="mappingfile")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('fibeWWWConfBundle:MappingFile')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new MappingFile entity.
     *
     * @Route("/", name="mappingfile_create")
     * @Method("POST")
     * @Template("fibeWWWConfBundle:MappingFile:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new MappingFile();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mappingfile_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a MappingFile entity.
     *
     * @param MappingFile $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MappingFile $entity)
    {
        $form = $this->createForm(new MappingFileType(), $entity, array(
            'action' => $this->generateUrl('mappingfile_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MappingFile entity.
     *
     * @Route("/new", name="mappingfile_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new MappingFile();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a MappingFile entity.
     *
     * @Route("/{id}", name="mappingfile_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeWWWConfBundle:MappingFile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MappingFile entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing MappingFile entity.
     *
     * @Route("/{id}/edit", name="mappingfile_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeWWWConfBundle:MappingFile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MappingFile entity.');
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
    * Creates a form to edit a MappingFile entity.
    *
    * @param MappingFile $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MappingFile $entity)
    {
        $form = $this->createForm(new MappingFileType(), $entity, array(
            'action' => $this->generateUrl('mappingfile_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing MappingFile entity.
     *
     * @Route("/{id}", name="mappingfile_update")
     * @Method("PUT")
     * @Template("fibeWWWConfBundle:MappingFile:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('fibeWWWConfBundle:MappingFile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MappingFile entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mappingfile_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a MappingFile entity.
     *
     * @Route("/{id}", name="mappingfile_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('fibeWWWConfBundle:MappingFile')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MappingFile entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mappingfile'));
    }

    /**
     * Creates a form to delete a MappingFile entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mappingfile_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

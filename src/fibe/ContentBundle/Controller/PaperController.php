<?php

namespace fibe\ContentBundle\Controller;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use fibe\ContentBundle\Entity\Paper;
use fibe\ContentBundle\Form\PaperType;
use fibe\ContentBundle\Form\Filters\PaperFilterType;

use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Exception\NotValidCurrentPageException;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Paper controller.
 *
 * @Route("/paper")
 */
class PaperController extends Controller
{
  /**
   * Lists all Paper entities.
   *
   * @Route("/", name="content_paper")
   * @Template()
   */
  public function indexAction(Request $request)
  {
    $entities = $this->get('fibe_security.acl_entity_helper')->getEntitiesACL('VIEW', 'Paper');

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

    $filters = $this->createForm(new PaperFilterType($this->getUser()));

    return array(
      'pager' => $pager,
      'filters_form' => $filters->createView(),
    );
  }


  /**
   * Filter paper index list
   *
   * @Route("/filter", name="content_paper_filter")
   */
  public function filterAction(Request $request)
  {
    $em = $this->getDoctrine()->getManager();

    $conf = $this->getUser()->getCurrentMainEvent();
    //Filters
    $filters = $this->createForm(new PaperFilterType($this->getUser()));
    $filters->submit($request);

    if ($filters->isValid())
    {
      // bind values from the request

      $entities = $em->getRepository('fibeContentBundle:Paper')->filtering($filters->getData(), $conf);
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
        'fibeContentBundle:Paper:list.html.twig',
        array(
          'pager' => $pager,
          'nbResult' => $nbResult,
        )
      );
    }
  }

  /**
   * Creates a new Paper entity.
   *
   * @Route("/create", name="content_paper_create")
   * @Template()
   */
  public function createAction(Request $request)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('CREATE', 'Paper');
    $form = $this->createForm(new PaperType($this->getUser()), $entity);
    $form->bind($request);

    if ($form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $entity->setMainEvent($this->getUser()->getCurrentMainEvent());
      $em->persist($entity);
      $em->flush();

      //$this->get('fibe_security.acl_entity_helper')->createACL($entity,MaskBuilder::MASK_OWNER);

      return $this->redirect($this->generateUrl('content_paper'));
    }

    return $this->render(
      'fibeContentBundle:Paper:new.html.twig',
      array(
        'entity' => $entity,
        'form' => $form->createView()
      )
    );
  }

  /**
   * Displays a form to create a new Paper entity.
   *
   * @Route("/new", name="content_paper_new")
   * @Template()
   */
  public function newAction()
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('CREATE', 'Paper');
    //Authorization Verification conference sched manager
    $form = $this->createForm(new PaperType($this->getUser()), $entity);

    return $this->render(
      'fibeContentBundle:Paper:new.html.twig',
      array(
        'entity' => $entity,
        'form' => $form->createView(),
      )
    );
  }

  /**
   * Finds and displays a Paper entity.
   *
   * @Route("/{id}/show", name="content_paper_show")
   * @Template()
   */
  public function showAction($id)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('VIEW', 'Paper', $id);
    $deleteForm = $this->createDeleteForm($id);

    return $this->render(
      'fibeContentBundle:Paper:show.html.twig',
      array(
        'entity' => $entity,
        'delete_form' => $deleteForm->createView()
      )
    );
  }

  /**
   * Displays a form to edit an existing Paper entity.
   *
   * @Route("/{id}/edit", name="content_paper_edit")
   * @Template()
   */
  public function editAction($id)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT', 'Paper', $id);

    $editForm = $this->createForm(new PaperType($this->getUser()), $entity);
    $deleteForm = $this->createDeleteForm($id);

    return $this->render(
      'fibeContentBundle:Paper:edit.html.twig',
      array(
        'entity' => $entity,
        'edit_form' => $editForm->createView(),
        'delete_form' => $deleteForm->createView()
      )
    );
  }

  /**
   * Edits an existing Paper entity.
   *
   * @Route("/{id}/update", name="content_paper_update")
   */
  public function updateAction(Request $request, $id)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('EDIT', 'Paper', $id);

    $editForm = $this->createForm(new PaperType($this->getUser()), $entity);
    $editForm->bind($request);

    if ($editForm->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->persist($entity);
      $em->flush();
    }

    return $this->redirect($this->generateUrl('content_paper_show', array('id' => $id)));
  }

  /**
   * Deletes a Paper entity.
   *
   * @Route("/{id}/delete", name="content_paper_delete")
   * @Method({"POST", "DELETE"})
   */
  public function deleteAction(Request $request, $id)
  {
    $entity = $this->get('fibe_security.acl_entity_helper')->getEntityACL('DELETE', 'Paper', $id);

    $form = $this->createDeleteForm($id);
    $form->bind($request);

    if ($form->isValid())
    {
      $em = $this->getDoctrine()->getManager();
      $em->remove($entity);
      $em->flush();
      $this->container->get('session')->getFlashBag()->add(
        'success',
        'Paper successfully deleted !'
      );
    }

    return $this->redirect($this->generateUrl('content_paper'));
  }

  /**
   * Creates a form to delete a Paper entity by id.
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

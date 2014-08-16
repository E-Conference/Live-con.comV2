<?php

namespace fibe\RestBundle\Handler;

use Doctrine\ORM\EntityManager;
use fibe\RestBundle\Search\SearchServiceInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class CrudHandler
{
  protected $em;
  protected $serializer;
  protected $formFactory;
  protected $searchService;

  public function __construct(EntityManager $em, SerializerInterface $serializer, FormFactoryInterface $formFactory,SearchServiceInterface $searchService)
  {
    $this->em = $em;
    $this->serializer = $serializer;
    $this->formFactory = $formFactory;
    $this->searchService = $searchService;
  }

  public function get($entityClassName, $id)
  {
    return $this->em->getRepository($entityClassName)->find($id);
  }

  public function getAll($entityClassName, ParamFetcherInterface $paramFetcher = null)
  {
    $offset = $paramFetcher->get('offset');
//    $offset = null == $offset ? 0 : $offset;
    $limit = $paramFetcher->get('limit');
    $order = $paramFetcher->get('order');

    if(($query = $paramFetcher->get('query')) != null)
    {
      return $this->searchService->doSearch($entityClassName, $query, $limit, $offset, $order);
    }

    return $this->em->getRepository($entityClassName)->findBy(array(), $order, $limit, $offset);
  }

  /**
   * Processes the form.
   *
   * @param string $entityClassName
   * @param string $formClassName
   * @param Request $request
   * @param String $method
   *
   * @return mixed $entity|form validation errors
   */
  public function processForm(Request $request, $entityClassName, $formClassName, $method)
  {
    //TODO secure with acl
    $formData = $request->request->all();
    if($method == "POST")
    {
      $entity = new $entityClassName();
    }
    else
    {
      $entity = $this->em->getRepository($entityClassName)->find($formData['id']);
    }
    $form = $this->formFactory->create(new $formClassName(), $entity, array('method' => $method));
    unset($formData['id']);//remove id to avoid form validation error with this unnecessary id
    unset($formData['dtype']);//remove dtype to avoid form validation error with this unnecessary dtype (TODO remove dtype from serialization)
    $form->submit($formData, 'PATCH' !== $method);
    if ($form->isValid())
    {
      //TODO call a service for business logic if it exists
      $entity = $form->getData();
      $this->em->persist($entity);
      $this->em->flush($entity);
      return $entity;
    }

    return array(
      'form' => $form,
    );
  }

  public function delete($entityClassName, $id)
  {
    $entity = $this->em->getRepository($entityClassName)->find($id);
    $this->em->remove($entity);
    $this->em->flush($entity);
  }

}

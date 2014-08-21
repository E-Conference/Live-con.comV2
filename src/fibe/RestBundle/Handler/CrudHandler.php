<?php

namespace fibe\RestBundle\Handler;

use Doctrine\ORM\EntityManager;
use fibe\RestBundle\Search\SearchServiceInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcherInterface;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class CrudHandler
{
  protected $em;
  protected $container;

  public function __construct(ContainerInterface $container )
  {
    $this->container      = $container;
    $this->em             = $container->get('doctrine.orm.entity_manager');
  }

  /**
   * @param string $entityClassName
   * @param string $id
   * @return mixed Entity
   */
  public function get($entityClassName, $id)
  {
    return $this->em->getRepository($entityClassName)->find($id);
  }

  /**
   * @param string $entityClassName
   * @param ParamFetcherInterface $paramFetcher
   * @return array of Entities
   */
  public function getAll($entityClassName, ParamFetcherInterface $paramFetcher = null)
  {
    $offset = $paramFetcher->get('offset');
//    $offset = null == $offset ? 0 : $offset;
    $limit = $paramFetcher->get('limit');
    $order = $paramFetcher->get('order');

    if(($query = $paramFetcher->get('query')) != null)
    {
      return $this->container->get('fibe.rest.searchservice')->doSearch($entityClassName, $query, $limit, $offset, $order);
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
   * @param String $id
   *
   * @return mixed $entity|form validation errors
   */
  public function processForm(Request $request, $entityClassName, $formClassName, $method, $id = null)
  {
    //TODO secure with acl
    $formData = $request->request->all();
    if($id === null)
    {
      $entity = new $entityClassName();
    }
    else
    {
      $entity = $this->em->getRepository($entityClassName)->find($id);
    }
    $form = $this->container->get('form.factory')->create(new $formClassName(), $entity, array('method' => $method));
    unset($formData['id']);//remove id to avoid form validation error with this unnecessary id
    unset($formData['dtype']);//remove dtype to avoid form validation error with this unnecessary dtype (TODO remove dtype from serialization)
    $form->submit($formData, 'PATCH' !== $method);
    if ($form->isValid())
    {
      $entity = $form->getData();
      //get the service of the entity conventionally named fibe.{entityNme}Service
      try
      {
        if($entityService = $this->container->get('fibe.'.substr($entityClassName, strrpos($entityClassName,'\\') + 1).'Service'))
        {
          if(method_exists($entityService,strtolower($method)))
          {
            call_user_func_array(array($entityService, strtolower($method)), array($entity));
          }
        }
      }
      catch(ServiceNotFoundException $e)
      {
        //no business service defined
      }

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

<?php
namespace fibe\RestBundle\Services;


use Doctrine\ORM\EntityManagerInterface;

/**
 * 
 * @author benoitddlp
 */

abstract class AbstractBusinessService {


  /**
   * check if an attribute has been changed, if so : return the old value
   * @param EntityManagerInterface $em
   * @param mixed $entity
   * @param string $attribute
   * @return false | mixed the old attribute
   */
  protected function isDirty(EntityManagerInterface $em, $entity, $attribute)
  {
    $uow = $em->getUnitOfWork();
    $metaData = $em->getClassMetadata(get_class($entity));
    $uow->computeChangeSet($metaData, $entity);
    $changeset = $uow->getEntityChangeSet($entity);
    return isset($changeset[$attribute]) ? $changeset[$attribute][0] : false;
  }
} 
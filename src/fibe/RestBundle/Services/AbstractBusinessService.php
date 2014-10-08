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

    /**
     * Add a copy of a contextualized object to its global representation for every conference
     * @param EntityManagerInterface $em
     * @param mixed $entity
     * @param mixed $entityClassName
     * @return false | mixed the old attribute
     */
    protected function createGlobalEntity(EntityManagerInterface $em, $entity, $entityClassName, $setterFct)
    {
        if($entity == null){
            return false;
        }

        $globalEntityClassName = $entityClassName."Global";

        $globalEntity = $em->getRepository($globalEntityClassName)->findOneByLabel($entity->getLabel());

        if($globalEntity == null){
            $globalEntity = new $globalEntityClassName();
            $globalEntity->setDescription($entity->getDescription());
            $globalEntity->setLabel($entity->getLabel());
        }

        $entity->$setterFct($globalEntity);

        $em->persist($entity);
        $em->persist($globalEntity);
        $em->flush();

        return true;
    }


} 
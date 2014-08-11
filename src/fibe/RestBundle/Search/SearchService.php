<?php
/**
 * 
 * @author benoitddlp
 */

namespace fibe\RestBundle\Search;

use Doctrine\Common\Annotations\Reader;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Expr\OrderBy;

class SearchService implements SearchServiceInterface
{
  private $em;
  private $reader;

  private $annotationClass = 'Doctrine\\ORM\\Mapping\\Column';

  public function __construct(EntityManager $em,Reader $reader)
  {
    $this->reader = $reader;
    $this->em = $em;
  }

  /**
   * {@inheritdoc}
   */
  public function doSearch($entityClassName, $query, $limit, $offset, $orders = null)
  {
    $searchFields = $this->getSearchFields($entityClassName);
    $qb = $this->em->getRepository($entityClassName)->createQueryBuilder('qb')  //add select and array for JSON
    ->setMaxResults($limit)
    ->setFirstResult($offset);

    foreach($searchFields as $searchField)
    {
      $qb->orWhere('qb.'.$searchField.' LIKE :string')
        ->setParameter('string', '%'.$query.'%');
    }

    if(count($orders) > 0)
    {
      foreach($orders as $field => $order)
      {
        $qb->addOrderBy('qb.'.$field,$order);
      }
    }


    return $qb->getQuery()->getResult();
  }

  /**
   * @param string $entityClassName
   * @return array
   */
  protected function getSearchFields($entityClassName)
  {
    $searchFields = [];
    $reflectionObject = new \ReflectionObject(new $entityClassName());

    foreach ($reflectionObject->getProperties() as $reflectionProperty) {
      $annotation = $this->reader->getPropertyAnnotation($reflectionProperty, $this->annotationClass);
      if (null !== $annotation && $annotation->type == 'string') {
        $fieldName = $annotation->name ? $annotation->name : $reflectionProperty->getName();
        $searchFields[] = $fieldName;
      }
    }
    return $searchFields;
  }
}
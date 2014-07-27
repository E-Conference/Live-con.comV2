<?php

namespace fibe\ContentBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * RoleLabelRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class RoleLabelRepository extends EntityRepository
{
  /**
   * getOrderedQueryBuilder
   *
   * @return Object QueryBuilder
   */
  public function getOrderedQueryBuilder()
  {
    $qb = $this->createQueryBuilder('loc');
    $qb->orderBy('loc.name', 'ASC');

    return $qb;
  }

  /**
   * getOrderedQuery
   *
   * @return Object Query
   */
  public function getOrderedQuery()
  {
    $qb = $this->getOrderedQueryBuilder();

    return is_null($qb) ? $qb : $qb->getQuery();
  }

  /**
   * getOrdered
   *
   * @return Object DoctrineCollection
   */
  public function getOrdered()
  {
    $q = $this->getOrderedQuery();

    return is_null($q) ? array() : $q->getResult();
  }

  /**
   * extractQueryBuilder
   *
   * @param array $params
   *
   * @return Object QueryBuilder
   */
  public function extractQueryBuilder($params)
  {
    $qb = $this->getOrderedQueryBuilder();

    if (isset($params['id']))
    {
      $qb
        ->andWhere('loc.id = :id')
        ->setParameter('id', $params['id']);
    }

    if (isset($params['ids']))
    {
      $qb
        ->andWhere($qb->expr()->in('loc.id', $params['ids']));
    }

    return $qb;
  }

  /**
   * extractQuery
   *
   * @param array $params
   *
   * @return Object Query
   */
  public function extractQuery($params)
  {
    $qb = $this->extractQueryBuilder($params);

    return is_null($qb) ? $qb : $qb->getQuery();
  }

  /**
   * extract
   *
   * @param array $params
   *
   * @return Object DoctrineCollection
   */
  public function extract($params)
  {
    $q = $this->extractQuery($params);

    return is_null($q) ? array() : $q->getResult();
  }
}
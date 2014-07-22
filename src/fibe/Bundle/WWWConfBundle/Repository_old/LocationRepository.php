<?php

/**
 *
 * @author :  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace fibe\Bundle\WWWConfBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LocationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LocationRepository extends EntityRepository
{
  /**
   * getOrderedQueryBuilder
   *
   * @return QueryBuilder
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
   * @return Query
   */
  public function getOrderedQuery()
  {
    $qb = $this->getOrderedQueryBuilder();

    return is_null($qb) ? $qb : $qb->getQuery();
  }

  /**
   * getOrdered
   *
   * @return DoctrineCollection
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
   * @return QueryBuilder
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
   * @return Query
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
   * @return DoctrineCollection
   */
  public function extract($params)
  {
    $q = $this->extractQuery($params);

    return is_null($q) ? array() : $q->getResult();
  }
}

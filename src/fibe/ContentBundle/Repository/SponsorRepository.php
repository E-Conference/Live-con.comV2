<?php

namespace fibe\ContentBundle\Repository;

use Doctrine\ORM\EntityRepository;
use fibe\EventBundle\Entity\MainEvent;

/**
 * SponsorRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SponsorRepository extends EntityRepository
{
  /**
   * getOrderedQueryBuilder
   *
   * @return Object QueryBuilder
   */
  public function getOrderedQueryBuilder()
  {
    $qb = $this->createQueryBuilder('spon');
    $qb->orderBy('spon.name', 'ASC');

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
        ->andWhere('spon.id = :id')
        ->setParameter('id', $params['id']);
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

  /**
   * Filtre
   *
   * @param $params
   * @param MainEvent $currentMainEvent
   *
   * @return mixed
   */
  public function filtering($params, $currentMainEvent)
  {
    $qb = $this->createQueryBuilder('t');
    $qb
      ->where('t.conference = :conference_id')
      ->setParameter('conference_id', $currentMainEvent->getId());

    if (isset($params['id']))
    {
      $qb
        ->andWhere('t.id = :id')
        ->setParameter('id', $params['id']);
    }

    $query = $qb->getQuery();

    return $query->execute();

  }
}

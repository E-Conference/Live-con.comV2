<?php

namespace fibe\Bundle\WWWConfBundle\Repository_old;

use Doctrine\ORM\EntityRepository;

/**
 * TopicRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TopicRepository extends EntityRepository
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


    if (isset($params['conference_id']))
    {
      $qb
        ->andWhere('loc.conference = :conference_id')
        ->setParameter('conference_id', $params['conference_id']);
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

  /**
   * Filtering method
   *
   * @param $params
   * @param $currentMainEvent
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

    if (isset($params['paper']))
    {
      $qb
        ->leftJoin('t.papers', 'p')
        ->andWhere('p.id = :paper_id')
        ->setParameter('paper_id', $params['paper']);
    }


    $query = $qb->getQuery();

    return $query->execute();

  }
}
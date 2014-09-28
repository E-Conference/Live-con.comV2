<?php

namespace fibe\CommunityBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * OrganizationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrganizationRepository extends EntityRepository
{
  /**
   * getOrderedQueryBuilder
   *
   * @return Object QueryBuilder
   */
  public function getOrderedQueryBuilder()
  {
    $qb = $this->createQueryBuilder('comp');
    $qb->orderBy('comp.name', 'ASC');

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
        ->andWhere('comp.id = :id')
        ->setParameter('id', $params['id']);
    }

    if (isset($params['ids']))
    {
      $qb
        ->andWhere($qb->expr()->in('comp.id', $params['ids']));
    }

    if (isset($params['label']))
    {
      $qb
        ->andWhere('comp.label = :label')
        ->setParameter('label', $params['label']);
    }

    if (isset($params['mainEvent_id']))
    {
      $qb
        ->andWhere('comp.mainEvent = :mainEvent_id')
        ->setParameter('mainEvent_id', $params['mainEvent_id']);
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
   * filtering function
   *
   * @param $params
   * @param $currentMainEvent
   *
   * @return mixed
   */
  public function filtering($params, $currentMainEvent)
  {
    $qb = $this->createQueryBuilder('comp');
    $qb
      ->where('comp.mainEvent = :mainEvent_id')
      ->setParameter('mainEvent_id', $currentMainEvent->getId());

    if (isset($params['id']))
    {
      $qb
        ->andWhere('comp.id = :id')
        ->setParameter('id', $params['id']);
    }

    if (isset($params['member']))
    {
      $qb
        ->leftJoin('comp.members', 'pers')
        ->andWhere('pers.id = :person_id')
        ->setParameter('person_id', $params['member']);
    }

    if (isset($params['country']))
    {
      $qb
        ->andWhere($qb->expr()->like('org.country', $qb->expr()->literal('%' . $params['country'] . '%')));

    }

    $query = $qb->getQuery();

    return $query->execute();

  }
}
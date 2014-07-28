<?php

namespace fibe\EventBundle\Repository;

/**
 * MainEventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 *
 */
class MainEventRepository extends VEventRepository
{
  /**
   * getOrderedQueryBuilder
   *
   * @return Object QueryBuilder
   */
  public function getOrderedQueryBuilder()
  {
    $qb = $this->createQueryBuilder('me');
    $qb->orderBy('me.startAt', 'DESC');

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
   * Return a conference by name searching it
   *
   * @param $name
   *
   * @return mixed
   */
  public function findByName($name)
  {
    $qb = $this->createQueryBuilder('me');

    $qb
      ->where($qb->expr()->like('me.label', $qb->expr()->literal('%' . $name . '%')));

    $query = $qb->getQuery();

    return $query->execute();
  }

  /**
   * Find conf by descending
   *
   * @return mixed
   */
  public function findOrderByDate()
  {

    $qb = $this->createQueryBuilder('me');

    $qb
      ->orderBy('me.startAt', 'DESC');

    $query = $qb->getQuery();

    return $query->execute();
  }
}

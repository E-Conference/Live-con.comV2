<?php

namespace fibe\EventBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * StatusRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class StatusRepository extends EntityRepository
{
  /**
   * getDiscrStatusQueryBuilder
   *
   * @param $discr string the discriminant
   *
   * @return QueryBuilder
   */
  public function getDiscrStatusQueryBuilder($discr)
  {
    $qb = $this->createQueryBuilder('s')
      ->where('s.discr = :discr')
      ->setParameter('discr', $discr)
      ->orderBy('s.value', 'ASC');

    return $qb;
  }

  /**
   * getDiscrStatusQuery
   *
   * @param $discr string the discriminant
   *
   * @return Query
   */
  public function getDiscrStatusQuery($discr)
  {
    $qb = $this->getDiscrStatusQueryBuilder($discr);

    return is_null($qb) ? $qb : $qb->getQuery();
  }

  /**
   * getDiscrStatus
   *
   * @param $discr string the discriminant
   *
   * @return array
   */
  public function getDiscrStatus($discr)
  {
    $q = $this->getDiscrStatusQuery($discr);

    return is_null($q) ? array() : $q->getResult();
  }
}

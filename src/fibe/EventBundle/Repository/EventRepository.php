<?php

namespace fibe\EventBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends EntityRepository
{

  /**
   * filtering by main event
   * @param $qb , query builder to add the filter to
   * @param $MainEventId , the main event to filter on
   * @return $qb, modified query builder
   */
  public function findAllByMainEventId($qb, $MainEventId)
  {
    if (isset($MainEventId))
    {
      $qb->andWhere('qb.mainEvent = (:MainEventId)');
      $qb->setParameter('MainEventId', $MainEventId);
    }
    return $qb;
  }

}
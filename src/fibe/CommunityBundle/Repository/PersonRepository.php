<?php

/**
 *
 * @author :  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace fibe\CommunityBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LocationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 *
 */
class PersonRepository extends EntityRepository
{

    /**
     * filtering by main event
     * @param $qb, query builder to add the filter to
     * @param $MainEventId, the main event to filter on
     * @return $qb, modified query builder
     */
    public function findAllByMainEventId($qb, $MainEventId){
        if (isset($MainEventId))
        {
            $qb->leftJoin('qb.roles', 'r');
            $qb->leftJoin('r.mainEvent', 'ev');
            $qb->andWhere('ev.id = (:MainEventId)');
            $qb->setParameter('MainEventId', $MainEventId);
        }
        return $qb;
    }

    /**
     * filtering with all parameters difned
     * @param $qb , query builder to add the filter to
     * @param $params , the field to filter on
     * @return $qb, modified query builder
     */
    public function filter($qb, $params)
    {
        return $qb;
    }
}

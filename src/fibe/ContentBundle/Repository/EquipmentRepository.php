<?php

/**
 *
 * @author :  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace fibe\ContentBundle\Repository;

use Doctrine\ORM\EntityRepository;
use fibe\ContentBundle\Entity\Equipment;
use fibe\ContentBundle\Entity\Location;

/**
 * LocationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 *
 */
class EquipmentRepository extends EntityRepository
{


    /**
     * filtering with all parameters difned
     * @param $qb , query builder to add the filter to
     * @param $params , the field to filter on
     * @return $qb, modified query builder
     */
    public function filter($qb, $params)
    {
//        if (isset($params['mainEventId'])) {
//            $qb->leftJoin('qb.mainEvent', 'ev');
//            $qb->andWhere('ev.id = (:MainEventId)');
//            $qb->setParameter('MainEventId', $params['mainEventId']);
//
//        }
        return $qb;
    }
}
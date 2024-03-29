<?php


namespace fibe\SecurityBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 *
 */
class UserRepository extends EntityRepository
{

  /**
   * @TODO     comment
   *
   * @param $team
   * @param $excludedId
   *
   * @internal param $currentMainEvent
   *
   * @return \Doctrine\ORM\QueryBuilder
   */
  public function ManagerForSelectTeamQuery($team, $excludedId = -1)
  {

    //Init array with all id of managers actually in the team.
    $managers_ids = array();
    foreach ($team->getTeammates() as $manager_id)
    {
      $managers_ids[] = $manager_id;
    }
    $qb = $this->createQueryBuilder('mng');
    $qb
      ->where($qb->expr()->notIn('mng.id', ':managers_ids'))
      ->setParameter('managers_ids', $managers_ids);

    return $qb;

  }


}

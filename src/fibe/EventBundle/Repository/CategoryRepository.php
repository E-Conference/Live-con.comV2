<?php

namespace fibe\EventBundle\Repository;

use Doctrine\ORM\EntityRepository;
use fibe\EventBundle\Entity\Category;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
  /**
   * getOrderedQueryBuilder
   *
   * @return QueryBuilder
   */
  public function getOrderedQueryBuilder()
  {
    $qb = $this->createQueryBuilder('cat')
      ->orderBy('cat.level', 'ASC')
      ->addOrderBy('cat.parent', 'ASC')
      ->addOrderBy('cat.name', 'ASC');

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

    if (isset($params['level']))
    {
      $qb
        ->andWhere('cat.level = :level')
        ->setParameter('level', $params['level']);
    }
    if (isset($params['levels']))
    {
      $qb
        ->andWhere($qb->expr()->in('cat.level', $params['levels']));
    }

    if (isset($params['id']))
    {
      $qb
        ->andWhere('cat.id = :id')
        ->setParameter('id', $params['id']);
    }

    if (isset($params['ids']))
    {
      $qb
        ->andWhere($qb->expr()->in('cat.id', $params['ids']));
    }

    if (isset($params['parent_category_id']))
    {
      $qb
        ->andWhere('cat.parent = :parent_id')
        ->setParameter('parent_id', $params['parent_category_id']);
    }

    if (isset($params['parent_category_ids']))
    {
      $qb
        ->andWhere($qb->expr()->in('cat.parent', $params['parent_category_ids']));
    }

    if (isset($params['ancestor_category_id']))
    {
      $qb
        ->andWhere(
          $qb->expr()->like(
            'cat.tree',
            sprintf(
              "'%%%d%s'",
              $params['ancestor_category_id'],
              Category::getTreeSeparator()
            )
          )
        );
    }

    if (isset($params['ancestor_category_ids']))
    {
      $temp = array();
      foreach ($params['ancestor_category_ids'] as $id)
      {
        $temp[] = $qb->expr()->like(
          'cat.tree',
          sprintf(
            "'%%%d%s'",
            $id,
            Category::getTreeSeparator()
          )
        );
      }
      $qb->andWhere(call_user_func_array(array($qb->expr(), 'orx'), $temp));
    }

    if (isset($params['location_id']))
    {
      $qb
        ->leftJoin('cat.calendarEntities', 'ce')
        ->andWhere('ce.location = :loc_id')
        ->setParameter('loc_id', $params['location_id']);
    }

    if (isset($params['all_in_location_id']))
    {
      $tempQb = $this->getOrderedQueryBuilder()
        ->leftJoin('cat.calendarEntities', 'ce')
        ->andWhere('ce.location = :loc_id')
        ->setParameter('loc_id', $params['all_in_location_id']);

      $tempResult = $tempQb->getQuery()->getResult();

      $tempIds = array();
      foreach ($tempResult as $r)
      {
        $tempIds[$r->getId()] = 1;
        $ids = explode(Category::getTreeSeparator(), $r->getTree());
        foreach ($ids as $id)
        {
          if ($id != '')
          {
            $tempIds[$id] = 1;
          }
        }
      }

      $qb
        ->andWhere($qb->expr()->in('cat.id', array_keys($tempIds)));
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

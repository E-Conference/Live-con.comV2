<?php
/**
 *
 * @author benoitddlp
 */
namespace fibe\RestBundle\Search;

interface SearchServiceInterface
{
  public function doSearch($entityClassName, $query, $limit, $offset);
}
<?php

namespace fibe\EventBundle\Services;

use Doctrine\ORM\EntityManager;


use fibe\EventBundle\Entity\Category;
use fibe\RestBundle\Services\AbstractBusinessService;
use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * Class CategoryService
 * @package fibe\EventBundle\Services
 */
class CategoryService extends AbstractBusinessService
{

    protected $entityManager;
    protected $securityContext;

    public function __construct(EntityManager $entityManager, SecurityContextInterface $securityContext)
    {
        $this->entityManager   = $entityManager;
        $this->securityContext = $securityContext;
    }


    public function post(Category $category = null,  $categoryClassName)
    {
        $this->createGlobalEntity($this->entityManager, $category, $categoryClassName, "setCategoryGlobal");
    }


}

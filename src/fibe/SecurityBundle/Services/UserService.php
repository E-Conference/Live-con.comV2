<?php
namespace fibe\SecurityBundle\Services;

use Doctrine\ORM\EntityManager;

use fibe\CommunityBundle\Entity\Person;
use fibe\SecurityBundle\Entity\User;
use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * 
 * @author benoitddlp
 */
class UserService
{

  protected $entityManager;
  protected $securityContext;

  public function __construct(EntityManager $entityManager, SecurityContextInterface $securityContext)
  {
    $this->entityManager = $entityManager;
    $this->securityContext = $securityContext;
  }

  public function post(User $user)
  {
    $person = new Person();
    $person->setUser($user);
    $this->entityManager->persist($person);
    return $user;
  }
}


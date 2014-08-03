<?php

namespace fibe\ContentBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This entity define a role for a person in an event
 *
 *
 * @ORM\Table(name="role_type")
 * @ORM\Entity(repositoryClass="fibe\ContentBundle\Repository\RoleLabelRepository")
 *
 */
class RoleLabel
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * label
   *
   * @ORM\Column(type="string", name="label", nullable=false)
   */
  protected $label;

  /**
   * @ORM\Column(type="string", name="context", nullable=false)
   */
  protected $context = 'CONFERENCE';

  /**
   * role
   * Role who have this type
   *
   * @ORM\OneToMany(targetEntity="Role", mappedBy="label")
   */
  private $roles;

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->role = new ArrayCollection();
  }

  /**
   * Get id
   *
   * @return integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Add role
   *
   * @param Role $role
   *
   * @return Role
   */
  public function addRole(Role $role)
  {
    $this->role[] = $role;

    return $this;
  }

  /**
   * Remove role
   *
   * @param Role $role
   */
  public function removeRole(Role $role)
  {
    $this->role->removeElement($role);
  }

  /**
   * Get role
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getRoles()
  {
    return $this->roles;
  }

  /**
   * __toString method
   *
   * @return mixed
   */
  public function __toString()
  {
    return $this->label;
  }

  /**
   * Set label
   *
   * @param string $label
   *
   * @return String
   */
  public function setLabel($label)
  {
    $this->label = $label;

    return $this;
  }

  /**
   * Get label
   *
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }

  /**
   * @return mixed
   */
  public function getContext()
  {
    return $this->context;
  }

  /**
   * @param mixed $context
   */
  public function setContext($context)
  {
    $this->context = $context;
  }
}
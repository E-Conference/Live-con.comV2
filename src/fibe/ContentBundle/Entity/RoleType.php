<?php

namespace fibe\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This entity define a role for a person in an event
 *
 *
 * @ORM\Table(name="role_type")
 * @ORM\Entity(repositoryClass="fibe\ContentBundle\Repository\RoleTypeRepository")
 *
 */
class RoleType
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
   * role
   * Role how have this type
   *
   * @ORM\OneToMany(targetEntity="Role", mappedBy="type")
   */
  private $roles;

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->role = new \Doctrine\Common\Collections\ArrayCollection();
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
   * @param \fibe\ContentBundle\Entity\Role $role
   *
   * @return RoleType
   */
  public function addRole(\fibe\ContentBundle\Entity\Role $role)
  {
    $this->role[] = $role;

    return $this;
  }

  /**
   * Remove role
   *
   * @param \fibe\ContentBundle\Entity\Role $role
   */
  public function removeRole(\fibe\ContentBundle\Entity\Role $role)
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
   * @return RoleType
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
}
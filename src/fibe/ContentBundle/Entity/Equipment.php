<?php

namespace fibe\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use fibe\EventBundle\Entity\VEvent;
use fibe\ContentBundle\Entity\Location;

/**
 * This class define an Equipment for a location.
 *
 * @ORM\Table(name="equipment")
 * @ORM\Entity(repositoryClass="fibe\ContentBundle\Repository\EquipmentRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Equipment
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * label
   *
   * Equipment Label.
   *
   * @ORM\Column(type="string", length=255,name="label")
   */
  private $label;

  /**
   * @var string $icon
   * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
   * @ORM\Column(name="icon", type="string", length=255)
   */
  private $icon;

  public function __toString()
  {
    return $this->label;

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
   * Set label
   *
   * @param string $label
   *
   * @return Equipment
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
   * Set icon
   *
   * @param string $icon
   *
   * @return Equipment
   */
  public function setIcon($icon)
  {
    $this->icon = $icon;

    return $this;
  }

  /**
   * Get icon
   *
   * @return string
   */
  public function getIcon()
  {
    return $this->icon;
  }
}

<?php

namespace fibe\EventBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use fibe\ContentBundle\Util\StringTools;
use JMS\Serializer\Annotation\Expose;

/**
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="fibe\EventBundle\Repository\CategoryRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Category
{
  const DEFAULT_LEVEL = 3;
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=128)
   */
  private $label;

  /**
   * @ORM\Column(type="integer", options={"default" = 3})
   */
  private $level;

  /**
   * @ORM\Column(type="string", length=128)
   */
  private $slug;

  /**
   * @ORM\Column(type="text", nullable=true)
   */
  private $description;

  /**
   * @ORM\Column(type="string", nullable=true)
   */
  private $color;

  /**
   * VEvents related to an category
   *
   * @ORM\OneToMany(targetEntity="VEvent", mappedBy="category",cascade={"persist","remove"})
   * @ORM\JoinColumn( onDelete="CASCADE")
   * @Expose
   */
  private $vEvents;


  /**
   * toString
   *
   * @return string
   */
  public function __toString()
  {
    return $this->getLabel();
  }

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->childs = new ArrayCollection();
    $this->VEvent = new ArrayCollection();
    $this->level = self::DEFAULT_LEVEL;
  }

  /**
   * Slugify
   */
  public function slugify()
  {
    $this->setSlug(StringTools::slugify($this->getLabel()));
  }

  /**
   * onUpdate
   *
   * @ORM\PrePersist()
   * @ORM\PreUpdate()
   */
  public function onUpdate()
  {
    $this->slugify();
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
   * @param $label
   *
   * @return $this
   */
  public function setLabel($label)
  {
    $this->label = $label;

    return $this;
  }

  /**
   * Get name
   *
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }

  /**
   * Set slug
   *
   * @param string $slug
   *
   * @return $this
   */
  public function setSlug($slug)
  {
    $this->slug = $slug;

    return $this;
  }

  /**
   * Get slug
   *
   * @return string
   */
  public function getSlug()
  {
    return $this->slug;
  }

  /**
   * Set description
   *
   * @param string $description
   *
   * @return $this
   */
  public function setDescription($description)
  {
    $this->description = $description;

    return $this;
  }

  /**
   * Get description
   *
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * Set color
   *
   * @param string $color
   *
   * @return $this
   */
  public function setColor($color)
  {
    $this->color = $color;

    return $this;
  }

  /**
   * Get color
   *
   * @return string
   */
  public function getColor()
  {
    return $this->color;
  }

  /**
   * Set level
   *
   * @param integer $level
   *
   * @return $this
   */
  public function setLevel($level)
  {
    $this->level = $level;

    return $this;
  }

  /**
   * Get level
   *
   * @return integer
   */
  public function getLevel()
  {
    return $this->level;
  }

  /**
   * Add VEvent
   *
   * @param VEvent $VEvent
   *
   * @return $this
   */
  public function addVEvent(VEvent $VEvent)
  {
    $this->VEvent[] = $VEvent;

    return $this;
  }

  /**
   * Remove VEvent
   *
   * @param VEvent $VEvent
   */
  public function removeVEvent(VEvent $VEvent)
  {
    $this->VEvent->removeElement($VEvent);
  }

  /**
   * Get VEvent
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getVEvents()
  {
    return $this->vEvents;
  }

  /**
   * @param mixed $vEvents
   */
  public function setVEvents($vEvents)
  {
    $this->vEvents = $vEvents;
  }


}

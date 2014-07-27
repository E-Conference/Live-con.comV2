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
  protected $id;

  /**
   * @ORM\Column(type="string", length=128)
   */
  protected $label;

  /**
   * @ORM\Column(type="integer", options={"default" = 3})
   */
  protected $level;

  /**
   * @ORM\Column(type="string", length=128)
   */
  protected $slug;

  /**
   * @ORM\Column(type="text", nullable=true)
   */
  protected $description;

  /**
   * @ORM\Column(type="string", nullable=true)
   */
  protected $color;

  /**
   * VEvents related to an category
   *
   * @ORM\OneToMany(targetEntity="VEvent", mappedBy="category",cascade={"persist","remove"})
   * @ORM\JoinColumn( onDelete="CASCADE")
   * @Expose
   */
  private $VEvents;


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
    return $this->VEvent;
  }

  /**
   * Set mainEvent
   *
   * @param MainEvent $mainEvent
   *
   * @return $this
   */
  public function setMainEvent(MainEvent $mainEvent = null)
  {
    $this->mainEvent = $mainEvent;

    return $this;
  }

  /**
   * Get mainEvent
   *
   * @return \fibe\ConferenceBundle\Entity\MainEvent
   */
  public function getMainEvent()
  {
    return $this->mainEvent;
  }

}

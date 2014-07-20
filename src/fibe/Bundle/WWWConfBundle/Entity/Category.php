<?php

namespace fibe\Bundle\WWWConfBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use fibe\Bundle\WWWConfBundle\Util\StringTools;

/**
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="fibe\Bundle\WWWConfBundle\Repository\CategoryRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Category
{
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
   * @TODO EVENT ==> A mettre en oneToMany !!!
   *
   * @ORM\ManyToMany(targetEntity="VEvent", mappedBy="categories", cascade={"persist"})
   */
  private $calendarEntities;

  /**
   * @TODO EVENT ==> Lier à main event.
   * Rmq: Noemalement plus de lien avec un evenemet principal
   * puisque les categories seront ajoutés et globale
   *
   * @ORM\ManyToOne(targetEntity="MainEvent", inversedBy="categories")
   * @ORM\JoinColumn(name="conference_id", referencedColumnName="id")
   */
  protected $conference;

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
    $this->childs = new \Doctrine\Common\Collections\ArrayCollection();
    $this->calendarEntities = new \Doctrine\Common\Collections\ArrayCollection();
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
   * Set name
   *
   * @param string $name
   *
   * @return Category
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
   * @return Category
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
   * @return Category
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
   * @return Category
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
    if (null === $this->color && $this->hasParent())
    {
      return $this->getParent()->getColor();
    }

    return $this->color;
  }

  /**
   * Add calendarEntities
   *
   * @param \fibe\Bundle\WWWConfBundle\Entity\CalendarEntity $calendarEntities
   *
   * @return Category
   */
  public function addCalendarEntitie(\fibe\Bundle\WWWConfBundle\Entity\CalendarEntity $calendarEntities)
  {
    $this->calendarEntities[] = $calendarEntities;

    return $this;
  }

  /**
   * Remove calendarEntities
   *
   * @param \fibe\Bundle\WWWConfBundle\Entity\CalendarEntity $calendarEntities
   */
  public function removeCalendarEntitie(\fibe\Bundle\WWWConfBundle\Entity\CalendarEntity $calendarEntities)
  {
    $this->calendarEntities->removeElement($calendarEntities);
  }

  /**
   * Get calendarEntities
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getCalendarEntities()
  {
    return $this->calendarEntities;
  }

  /**
   * Set conference
   *
   * @param \fibe\Bundle\WWWConfBundle\Entity\WwwConf $wwwConf
   *
   * @return Category
   */
  public function setConference(\fibe\Bundle\WWWConfBundle\Entity\WwwConf $conference = null)
  {
    $this->conference = $conference;

    return $this;
  }

  /**
   * Get conference
   *
   * @return \fibe\Bundle\WWWConfBundle\Entity\WwwConf
   */
  public function getConference()
  {
    return $this->conference;
  }

}

<?php

namespace fibe\Bundle\WWWConfBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="location")
 * @ORM\Entity(repositoryClass="fibe\Bundle\WWWConfBundle\Repository\LocationRepository")
 */
class Location
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=255)
   */
  protected $label;

  /**
   * Capacity to welcome atendees
   *
   * @ORM\Column(type="integer", nullable=true)
   */
  protected $capacity;

  /**
   * Equipments who are in the location
   *
   * @ORM\ManyToMany(targetEntity="fibe\Bundle\WWWConfBundle\Entity\Equipment")
   */
  protected $equipments;

  /**
   * Description of the location
   *
   * @ORM\Column(type="text", nullable=true)
   */
  protected $description;

  /**
   * @ORM\Column(type="decimal", precision=10, scale=6, nullable=true)
   *
   * @Assert\Length(
   *      min = "-90",
   *      max = "90",
   *      minMessage = "You must be between -90 and 90.",
   *      maxMessage = "YYou must be between -90 and 90."
   * )
   */
  protected $latitude;

  /**
   * @ORM\Column(type="decimal", precision=10, scale=6, nullable=true)
   * @Assert\Length(
   *      min = "-180",
   *      max = "180",
   *      minMessage = "You must be between -180 and 180.",
   *      maxMessage = "YYou must be between -180 and 180."
   * )
   */
  protected $longitude;

  /**
   *
   * mainEvent
   *
   * @ORM\ManyToOne(targetEntity="fibe\Bundle\WWWConfBundle\Entity\MainEvent", inversedBy="locations", cascade={"persist"})
   * @ORM\JoinColumn(name="mainEvent_id", referencedColumnName="id")
   */
  protected $mainEvent;

  /**
   * Events
   *
   * @ORM\OneToMany(targetEntity="fibe\Bundle\WWWConfBundle\Entity\Event", mappedBy="location")
   */
  protected $events;



  /**
   * Constructor
   */
  public function __construct()
  {
    $this->equipments = new ArrayCollection();
    $this->events = new ArrayCollection();
  }

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
   * getGeo
   *
   * @return string
   */
  public function getGeo()
  {
    return sprintf('%.6f;%.6f', $this->getLatitude(), $this->getLongitude());
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
   * @param $label
   * @return Location
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

  /** Set capacity
   *
   * @param string $capacity
   *
   * @return Location
   */
  public function setCapacity($capacity)
  {
    $this->capacity = $capacity;

    return $this;
  }

  /**
   * Get capacity
   *
   * @return integer
   */
  public function getCapacity()
  {
    return $this->capacity;
  }

  /**
   * Set description
   *
   * @param string $description
   *
   * @return Location
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
   * Set latitude
   *
   * @param float $latitude
   *
   * @return Location
   */
  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;

    return $this;
  }

  /**
   * Get latitude
   *
   * @return float
   */
  public function getLatitude()
  {
    return $this->latitude;
  }

  /**
   * Set longitude
   *
   * @param float $longitude
   *
   * @return Location
   */
  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;

    return $this;
  }

  /**
   * Get longitude
   *
   * @return float
   */
  public function getLongitude()
  {
    return $this->longitude;
  }
  /**
   * Add event
   *
   * @param Event $event
   *
   * @return Location
   */
  public function addEvent(Event $event)
  {
    $this->events[] = $event;

    return $this;
  }

  /**
   * Remove event
   *
   * @param Event $event
   */
  public function removeEvent(Event $event)
  {
    $this->events->removeElement($event);
  }

  /**
   * Get event
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getEvents()
  {
    return $this->events;
  }
/*** @TODO EVENT ===> A RELIER à DES Event **/

  /**
   * Add Equipment
   *
   * @param Equipment $equipments
   *
   * @return $this
   */
  public function addEquipment(Equipment $equipments)
  {
    $this->equipments[] = $equipments;

    return $this;
  }

  /**
   * Remove Equipment
   *
   * @param Equipment $equipments
   */
  public function removeEquipment(Equipment $equipments)
  {
    $this->equipments->removeElement($equipments);
  }

  /**
   * Get Equipments
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getEquipments()
  {
    return $this->equipments;
  }

  /**
   * Set mainEvent
   *
   * @param MainEvent $mainEvent
   *
   * @return $this
   */
  public function setMainEvent(MainEvent $mainEvent)
  {
    $this->mainEvent = $mainEvent;

    return $this;
  }

  /**
   * Get mainEvent
   *
   * @return MainEvent
   */
  public function getMainEvent()
  {
    return $this->mainEvent;
  }
}

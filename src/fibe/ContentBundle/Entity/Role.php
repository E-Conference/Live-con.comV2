<?php
namespace fibe\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use fibe\EventBundle\Entity\MainEvent;
use fibe\EventBundle\Entity\VEvent;

use fibe\CommunityBundle\Entity\Person;


/**
 * The Role entity
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="fibe\ContentBundle\Repository\RoleRepository")
 *
 *  Don't seem to work with ajax form
 * @UniqueEntity(
 *     fields={"person", "event","type"},
 *     errorPath="role",
 *     message="This person has already this role at this event"
 * )
 *
 */
class Role
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * Person : the person who has this role
   *
   * @ORM\ManyToOne(targetEntity="fibe\CommunityBundle\Entity\Person", inversedBy="roles")
   * @Assert\NotBlank(message="You have to choose a Person")
   *
   */
  private $person;

  /**
   *
   * @ORM\ManyToMany(targetEntity="fibe\EventBundle\Entity\Event", mappedBy="roles")
   * @Assert\NotBlank(message="You have to choose an event")
   *
   */
  private $events;

  /**
   * The RoleType associated
   *
   * @ORM\ManyToOne(targetEntity="RoleLabel", inversedBy="roles")
   * @Assert\NotBlank(message="You have to choose a type")
   */
  private $label;

  /**
   * The mainEvent associated
   *
   * @ORM\ManyToOne(targetEntity="fibe\EventBundle\Entity\MainEvent", inversedBy="roles", cascade={"persist"})
   * @ORM\JoinColumn(name="main_event_id", referencedColumnName="id")
   */
  private $mainEvent;

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
   * Set person
   *
   * @param Person $person
   *
   * @return Role
   */
  public function setPerson(Person $person = null)
  {
    $this->person = $person;

    return $this;
  }

  /**
   * Get person
   *
   * @return Person
   */
  public function getPerson()
  {
    return $this->person;
  }

  /**
   * Set event
   *
   * @param \fibe\EventBundle\Entity\VEvent $events
   *
   * @internal param \fibe\EventBundle\Entity\VEvent $event
   *
   * @return Role
   */
  public function setEvents(VEvent $events = null)
  {
    $this->$events = $events;

    return $this;
  }

  /**
   * Get event
   *
   * @return VEvent
   */
  public function getEvents()
  {
    return $this->$events;
  }

  /**
   * Set type
   *
   * @param RoleLabel $type
   *
   * @return Role
   */
  public function setLabel(RoleLabel $type = null)
  {
    $this->label = $type;

    return $this;
  }

  /**
   * Get type
   *
   * @return RoleLabel
   */
  public function getLabel()
  {
    return $this->label;
  }

  /**
   * Set mainEvent
   *
   * @param MainEvent $mainEvent
   *
   * @return Role
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
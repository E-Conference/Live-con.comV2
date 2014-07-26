<?php
namespace fibe\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use fibe\EventBundle\Entity\MainEvent;
use fibe\EventBundle\Entity\VEvent;
use Symfony\Component\Validator\Constraints as Assert;

use fibe\CommunityBundle\Entity\Person;
use fibe\ContentBundle\Entity\RoleType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * This entity define relation between person and an event
 *
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
   * Person
   * @ORM\ManyToOne(targetEntity="Person", inversedBy="roles")
   * @Assert\NotBlank(message="You have to choose a Person")
   *
   */
  private $person;

  /**
   * VEvent
   * Persons related to an event
   * @ORM\ManyToOne(targetEntity="VEvent", inversedBy="roles")
   * @ORM\JoinColumn(name="vevent_id", referencedColumnName="id")
   * @Assert\NotBlank(message="You have to choose an event")
   *
   */
  private $VEvent;

  /**
   * @ORM\ManyToOne(targetEntity="RoleType", inversedBy="roles")
   * @Assert\NotBlank(message="You have to choose an type")
   */
  private $type;

  /**
   *
   * @ORM\ManyToOne(targetEntity="fibe\EventBundle\Entity\MainEvent", inversedBy="roles", cascade={"persist"})
   * @ORM\JoinColumn(name="main_event_id", referencedColumnName="id")
   *
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
   * @param \fibe\CommunityBundle\Entity\Person $person
   *
   * @return Role
   */
  public function setPerson(\fibe\CommunityBundle\Entity\Person $person = null)
  {
    $this->person = $person;

    return $this;
  }

  /**
   * Get person
   *
   * @return \fibe\CommunityBundle\Entity\Person
   */
  public function getPerson()
  {
    return $this->person;
  }

  /**
   * Set event
   *
   * @param VEvent $event
   *
   * @return Role
   */
  public function setEvent(VEvent $event = null)
  {
    $this->event = $event;

    return $this;
  }

  /**
   * Get event
   *
   * @return VEvent
   */
  public function getEvent()
  {
    return $this->event;
  }

  /**
   * Set type
   *
   * @param RoleType $type
   *
   * @return Role
   */
  public function setType(RoleType $type = null)
  {
    $this->type = $type;

    return $this;
  }

  /**
   * Get type
   *
   * @return RoleType
   */
  public function getType()
  {
    return $this->type;
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
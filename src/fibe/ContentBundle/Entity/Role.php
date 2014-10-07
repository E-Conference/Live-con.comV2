<?php
namespace fibe\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
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
 *     fields={"person", "event","roleLabel"},
 *     errorPath="role",
 *     message="This person has already this role at this event"
 * )
 * @ORM\HasLifecycleCallbacks
 * @ExclusionPolicy("all")
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
   * label
   * @ORM\Column(type="string", name="label", nullable=false)
   * @Expose
   */
  protected $label;

  /**
   * Person : the person who has this role
   *
   * @ORM\ManyToOne(targetEntity="fibe\CommunityBundle\Entity\Person", inversedBy="roles")
   * @Assert\NotBlank(message="You have to choose a Person")
   * @Expose
   */
  private $person;

  /**
   *
   * @ORM\ManyToOne(targetEntity="fibe\EventBundle\Entity\Event", inversedBy="roles")
   *
   * @Expose
   */
  private $event;

  /**
   * The mainEvent associated
   *
   * @ORM\ManyToOne(targetEntity="fibe\EventBundle\Entity\MainEvent", inversedBy="roles", cascade={"persist"})
   * @ORM\JoinColumn(name="main_event_id", referencedColumnName="id")
   * @Expose
   */
  private $mainEvent;

  /**
   * @ORM\ManyToOne(targetEntity="fibe\ContentBundle\Entity\RoleLabel", inversedBy="roles")
   * @ORM\JoinColumn(name="role_label_id", referencedColumnName="id")
   * @Assert\NotBlank(message="You have to choose a role type")
   */
  private $roleLabel;

  /**
   * @return mixed
   */
  public function getRoleLabel()
  {
    return $this->roleLabel;
  }

  /**
   * @param mixed $roleLabel
   */
  public function setRoleLabel($roleLabel)
  {
    $this->roleLabel = $roleLabel;
  }

  /**
   * computeEndAt
   *
   * @TODO EVENT : à corriger
   *
   * @ORM\PrePersist()
   * @ORM\PreUpdate()
   */
  public function computeEndAt()
  {
    $this->setLabel(sprintf("%s is %s at %s",
      $this->getPerson()->getlabel(),
      $this->getRoleLabel()->getlabel(),
      $this->getEvent()->getLabel()
    ));
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
   * @param \fibe\EventBundle\Entity\VEvent $event
   *
   * @internal param \fibe\EventBundle\Entity\VEvent $event
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
   * @param String $label
   *
   * @return String
   */
  public function setLabel($label)
  {
    $this->label = $label;

    return $this;
  }

  /**
   * Get type
   *
   * @return String
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
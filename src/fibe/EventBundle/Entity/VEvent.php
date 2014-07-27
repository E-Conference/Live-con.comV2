<?php
namespace fibe\EventBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use fibe\ContentBundle\Entity\Location;
use fibe\ContentBundle\Entity\Role;
use fibe\ContentBundle\Entity\Sponsor;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

use fibe\ContentBundle\Entity\Topic;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This entity is based on the "VEVENT" components
 * describe in the RFC2445
 *
 * Purpose: Provide a grouping of component properties that describe
 * a schedulable element.
 *
 * @ORM\Entity(repositoryClass="fibe\EventBundle\Repository\VEventRepository")
 * @ORM\Table(name="vevent", indexes={
 *    @ORM\Index(name="start_at_idx", columns={"start_at"})
 * })
 * @ORM\HasLifecycleCallbacks
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorMap({
 *     "Event"="Event",
 *     "MainEvent"="MainEvent",
 * })
 */
class VEvent
{
  // Status values for "EVENT"
  const STATUS_EVENT_CANCELLED = "CANCELLED"; // Indicates event was cancelled.
  const STATUS_EVENT_CONFIRMED = "CONFIRMED"; // Indicates event is definite.
  const STATUS_EVENT_TENTATIVE = "TENTATIVE"; // Indicates event is tentative.

  const CLASSIFICATION_PUBLIC = "PUBLIC";
  const CLASSIFICATION_PRIVATE = "PRIVATE";

  const DEFAULT_EVENT_DURATION = '+2 hour';

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * label -> summary
   *
   * This property defines a short summary or subject for the
   * calendar component.
   *
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $label;

  /**
   * dtstart
   *
   * This property specifies when the calendar component begins.
   *
   * @ORM\Column(type="datetime", name="start_at")
   */
  protected $startAt;

  /**
   * dtend
   *
   * This property specifies the date and time that a calendar
   * component ends.
   *
   * @ORM\Column(type="datetime", name="end_at")
   */
  protected $endAt;

  /**
   * description
   *
   * This property provides a more complete description of the
   * calendar component, than that provided by the "SUMMARY" property.
   *
   * @ORM\Column(type="text", nullable=true)
   */
  protected $description;

  /**
   * comment
   *
   * This property specifies non-processing information intended
   * to provide a comment to the calendar user.
   *
   * @ORM\Column(type="string", length=4047, nullable=true)
   */
  protected $comment;

  /**
   * organizer
   *
   * Purpose: The property defines the organizer for a calendar component.
   *
   * @TODO EVENT
   * ==>
   * Here in Livecon, the owner of the event is
   * the most responsible person of the event
   * <==
   *
   * The following is an example of this property:
   * ORGANIZER;CN=John Smith:MAILTO:jsmith@host1.com
   */
  protected $organizer;

  /**
   * sequence
   *
   * This property defines the revision sequence number of the
   * calendar component within a sequence of revisions.
   *
   * Description: When a calendar component is created, its sequence
   * number is zero (US-ASCII decimal 48). It is monotonically incremented
   * by the "Organizer's" CUA each time the "Organizer" makes a
   * significant revision to the calendar component. When the "Organizer"
   * makes changes to one of the following properties, the sequence number
   * MUST be incremented:
   * .  "DTSTART"
   * .  "DTEND"
   * .  "DUE"
   * .  "RDATE"
   * .  "RRULE"
   * .  "EXDATE"
   * .  "EXRULE"
   * .  "STATUS"
   *
   * @ORM\Column(type="integer", name="revision_sequence")
   */
  protected $revisionSequence = 0;

  /**
   * attendee
   *
   * The property defines an "Attendee" within a calendar
   * component.
   *
   * attendee   = "ATTENDEE" attparam ":" cal-address CRLF
   * attparam   = *(
   *           ; the following are optional,
   *           ; but MUST NOT occur more than once
   *           (";" cutypeparam) / (";"memberparam) /
   *           (";" roleparam) / (";" partstatparam) /
   *           (";" rsvpparam) / (";" deltoparam) /
   *           (";" delfromparam) / (";" sentbyparam) /
   *           (";"cnparam) / (";" dirparam) /
   *           (";" languageparam) /
   *           ; the following is optional,
   *           ; and MAY occur more than once
   *           (";" xparam)
   *           )
   *
   * The following are examples of this property's use for a to-do:
   *
   * ATTENDEE;MEMBER="MAILTO:DEV-GROUP@host2.com":
   *  MAILTO:joecool@host2.com
   * ATTENDEE;DELEGATED-FROM="MAILTO:immud@host3.com":
   *  MAILTO:ildoit@host1.com
   *
   * The following is an example of this property used for specifying
   * multiple attendees to an event:
   *
   * ATTENDEE;ROLE=REQ-PARTICIPANT;PARTSTAT=TENTATIVE;CN=Henry Cabot
   *  :MAILTO:hcabot@host2.com
   * ATTENDEE;ROLE=REQ-PARTICIPANT;DELEGATED-FROM="MAILTO:bob@host.com"
   *  ;PARTSTAT=ACCEPTED;CN=Jane Doe:MAILTO:jdoe@host1.com
   *
   * ==>
   * @TODO EVENT : à réfléchir... Ne pas persister en base, mais déduire
   * la propriété de manière logiqu avec la table atendee
   * <==
   *
   */
  protected $attendees;

  /**
   * contact
   *
   * The property is used to represent contact information or
   * alternately a reference to contact information associated with the
   * calendar component.
   *
   * ==>
   * @TODO EVENT : à réfléchir... Ne pas persister en base, mais déduire
   * la propriété de manière logiqu avec la table attendee
   * <==
   */
  protected $contacts;

  /**
   * class
   *
   * This property defines the access classification for a calendar component.
   *
   * class      = "CLASS" classparam ":" classvalue CRLF
   * classparam = *(";" xparam)
   * classvalue = "PUBLIC" / "PRIVATE" / "CONFIDENTIAL"
   * Default is PUBLIC
   *
   * ==>
   * @TODO EVENT : à réfléchir... Ne pas persister en base, mais déduire
   * la propriété de manière logique avec la table atendee
   * <==
   */
  protected $classification = self::CLASSIFICATION_PUBLIC;

  /**
   * status
   *
   * @ORM\Column(type="string", length=32)
   * @Assert\Choice(multiple=false, choices = {"CANCELLED","CONFIRMED","TENTATIVE"},  message = "Choose a valid status.")
   */
  protected $status = self::CLASSIFICATION_PUBLIC;

  /**
   * priority
   *
   * The property defines the relative priority for a calendar
   * component.
   *
   * @ORM\Column(type="integer", nullable=true)
   * @Assert\Range(
   *     min = "0",
   *     max = "9",
   *     minMessage = "priority must be at least 0",
   *     maxMessage = "priority must be at max 9"
   * )
   */
  protected $priority;

  /**
   * location
   *
   *
   * @ORM\ManyToOne(targetEntity="fibe\ContentBundle\Entity\Location", inversedBy="VEvents")
   * @ORM\JoinColumn(name="location_id", referencedColumnName="id", onDelete="Set Null")
   */
  protected $location;

  /**
   * location
   *
   * @ORM\ManyToOne(targetEntity="fibe\ContentBundle\Entity\Topic", inversedBy="VEvents")
   * @ORM\JoinColumn(name="topic_id", referencedColumnName="id", onDelete="Set Null")
   */
  protected $topics;

  /**
   * Category
   *
   * @ORM\ManyToOne(targetEntity="Category", inversedBy="VEvents")
   * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="Set Null")
   */
  protected $category;

  /**
   * Persons related to an event according to a role
   *
   * @ORM\OneToMany(targetEntity="fibe\ContentBundle\Entity\Role", mappedBy="VEvents",cascade={"persist","remove"})
   * @ORM\JoinColumn( onDelete="CASCADE")
   * @Expose
   */
  private $roles;

  /**
   * Sponsors related to a VEvent
   *
   * @ORM\OneToMany(targetEntity="fibe\ContentBundle\Entity\Sponsor", mappedBy="VEvents",cascade={"persist","remove"})
   * @ORM\JoinColumn( onDelete="CASCADE")
   * @Expose
   */
  private $sponsors;

  /**
   * url
   *
   * This property defines a Uniform Resource Locator (URL)
   * associated with the iCalendar object.
   *
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  protected $url;

  /**
   * Is an all day event
   * Used for ui representation in the calendar view
   *
   * @ORM\Column(name="is_all_day", type="boolean")
   * @Expose
   */
  private $isAllDay = false;

  /**
   * Is an all day event
   * Used for ui representation in the calendar view
   *
   * @ORM\Column(name="is_instant", type="boolean")
   * @Expose
   */
  private $isInstant;

  /**
   * created_at
   *
   * This property specifies the date and time that the calendar
   * information was created by the calendar user agent in the calendar
   * store.
   *
   * @ORM\Column(type="datetime", name="created_at")
   */
  protected $createdAt;

  /**
   * modified_at
   *
   * The property specifies the date and time that the
   * information associated with the calendar component was last revised
   * in the calendar store.
   *
   * @ORM\Column(type="datetime", name="last_modified_at")
   */
  protected $lastModifiedAt;

  /**
   * constructor
   */
  public function __construct()
  {
    $this->roles = new ArrayCollection();
    $this->sponsors = new ArrayCollection();
    $this->topics = new ArrayCollection();
    $this->setRevisionSequence($this->getRevisionSequence() + 1);
  }

  /**
   * toString
   *
   * @return string
   */
  public function __toString()
  {
    return sprintf("%d] start at %s : %s",
      $this->getId(),
      $this->getStartAt()->format('Y-m-d'),
      $this->getLabel()
    );
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
    if (!$this->getEndAt() && $this->getStartAt())
    {
      $endAt = clone $this->getStartAt();
      $endAt->modify(self::DEFAULT_EVENT_DURATION);
      $this->setEndAt($endAt);
      $this->setIsInstant(false);
    }
    else if (!$this->getStartAt())
    {
      $this->setEndAt((new \DateTime("now"))->modify(self::DEFAULT_EVENT_DURATION));
      $this->setStartAt(new \DateTime("now"));
      $this->setIsInstant(false);
    }
    else if ($this->getStartAt() == $this->getEndAt())
    {
      $this->setIsInstant(true);
    }
    else
    {
      $this->setIsInstant(false);
    }
  }

  /**
   * onCreation
   *
   * @ORM\PrePersist()
   */
  public function onCreation()
  {
    $now = new \DateTime('now');

    $this->setCreatedAt($now);
    $this->setLastModifiedAt($now);
  }

  /**
   * onUpdate
   *
   * @ORM\PreUpdate()
   */
  public function onUpdate()
  {
    $now = new \DateTime('now');

    $this->setLastModifiedAt($now);
  }

  /**
   * uid
   *
   * This property defines the persistent, globally unique
   * identifier for the calendar component.
   * Description: The UID itself MUST be a globally unique identifier. The
   * generator of the identifier MUST guarantee that the identifier is
   * unique. There are several algorithms that can be used to accomplish
   * this. The identifier is RECOMMENDED to be the identical syntax to the
   * [RFC 822] addr-spec. A good method to assure uniqueness is to put the
   * domain name or a domain literal IP address of the host on which the
   * identifier was created on the right hand side of the "@", and on the
   * left hand side, put a combination of the current calendar date and
   * time of day (i.e., formatted in as a DATE-TIME value) along with some
   * other currently unique (perhaps sequential) identifier available on
   * the system (for example, a process id number). Using a date/time
   * value on the left hand side and a domain name or domain literal on
   * the right hand side makes it possible to guarantee uniqueness since
   * no two hosts should be using the same domain name or IP address at
   * the same time. Though other algorithms will work, it is RECOMMENDED
   * that the right hand side contain some domain identifier (either of
   * the host itself or otherwise) such that the generator of the message
   * identifier can guarantee the uniqueness of the left hand side within
   * the scope of that domain.
   *
   * @param String $domain the server domain name or ip address
   *
   * @return String A unique UID
   */
  public function getUID($domain = 'default')
  {
    return sprintf('%s-%d@%s',
      $this->getFormatedStartAt(),
      $this->getId(),
      $domain
    );
  }

  /**
   * getFormatedStartAt
   *
   * @param $format   String the datetime format
   * @param $timezone String the timezone name
   *
   * @return String the formated datetime
   */
  public function getFormatedStartAt($format = \DateTime::RFC1123, $timezone = 'Europe/Paris')
  {
    $dt = $this->getStartAt();
    $dt->setTimeZone(new \DateTimezone($timezone));

    return $dt->format($format);
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
   * Set createdAt
   *
   * @param \DateTime $createdAt
   *
   * @return $this
   */
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;

    return $this;
  }

  /**
   * Get createdAt
   *
   * @return \DateTime
   */
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  /**
   * Set startAt
   *
   * @param \DateTime $startAt
   *
   * @return $this
   */
  public function setStartAt($startAt)
  {
    $this->startAt = $startAt;

    return $this;
  }

  /**
   * Get startAt
   *
   * @return \DateTime
   */
  public function getStartAt()
  {
    return $this->startAt;
  }

  /**
   * Set lastModifiedAt
   *
   * @param \DateTime $lastModifiedAt
   *
   * @return $this
   */
  public function setLastModifiedAt(\DateTime $lastModifiedAt)
  {
    $this->lastModifiedAt = $lastModifiedAt;

    return $this;
  }

  /**
   * Get lastModifiedAt
   *
   * @return \DateTime
   */
  public function getLastModifiedAt()
  {
    return $this->lastModifiedAt;
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
   * Set comment
   *
   * @param string $comment
   *
   * @return $this
   */
  public function setComment($comment)
  {
    $this->comment = $comment;

    return $this;
  }

  /**
   * Get comment
   *
   * @return string
   */
  public function getComment()
  {
    return $this->comment;
  }

  /**
   * Set isAllDay
   *
   * @param string $isAllDay
   *
   * @return VEvent
   */
  public function setIsAllDay($isAllDay)
  {
    $this->isAllDay = $isAllDay;

    return $this;
  }

  /**
   * Get isAllDay
   *
   * @return string
   */
  public function getIsAllDay()
  {
    return $this->isAllDay;
  }

  /**
   * Set isInstant
   *
   * @param string $isInstant
   *
   * @return VEvent
   */
  public function setIsInstant($isInstant)
  {
    $this->isInstant = $isInstant;

    return $this;
  }

  /**
   * Get isInstant
   *
   * @return string
   */
  public function getIsInstant()
  {
    return $this->isInstant;
  }

  /**
   * Set url
   *
   * @param string $url
   *
   * @return $this
   */
  public function setUrl($url)
  {
    $this->url = $url;

    return $this;
  }

  /**
   * Get url
   *
   * @return string
   */
  public function getUrl()
  {
    return $this->url;
  }

  /**
   * Set organizer
   *
   * @param string $organizer
   *
   * @return $this
   */
  public function setOrganizer($organizer)
  {
    $this->organizer = $organizer;

    return $this;
  }

  /**
   * Get organizer
   *
   * @return string
   */
  public function getOrganizer()
  {
    return $this->organizer;
  }

  /**
   * Set revisionSequence
   *
   * @param integer $revisionSequence
   *
   * @return $this
   */
  public function setRevisionSequence($revisionSequence)
  {
    $this->revisionSequence = $revisionSequence;

    return $this;
  }

  /**
   * Get revisionSequence
   *
   * @return integer
   */
  public function getRevisionSequence()
  {
    return $this->revisionSequence;
  }

  /**
   * Set attendees
   *
   * @param string $attendees
   *
   * @return $this
   */
  public function setAttendees($attendees)
  {
    $this->attendees = $attendees;

    return $this;
  }

  /**
   * Get attendees
   *
   * @return string
   */
  public function getAttendees()
  {
    return $this->attendees;
  }

  /**
   * Set contacts
   *
   * @param string $contacts
   *
   * @return $this
   */
  public function setContacts($contacts)
  {
    $this->contacts = $contacts;

    return $this;
  }

  /**
   * Get contacts
   *
   * @return string
   */
  public function getContacts()
  {
    return $this->contacts;
  }

  /**
   * Set classification
   *
   * @param string $classification
   *
   * @return $this
   */
  public function setClassification($classification)
  {
    $this->classification = $classification;

    return $this;
  }

  /**
   * Get classification
   *
   * @return string
   */
  public function getClassification()
  {
    return $this->classification;
  }

  /**
   * Set status
   *
   * @param String $status
   *
   * @return $this
   */
  public function setStatus($status)
  {
    $this->status = $status;

    return $this;
  }

  /**
   * Get status
   *
   * @return String
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * Set location
   *
   * @param Location $location
   *
   * @return $this
   */
  public function setLocation(Location $location = null)
  {
    $this->location = $location;

    return $this;
  }

  /**
   * Get location
   *
   * @return Location
   */
  public function getLocation()
  {
    return $this->location;
  }

  /**
   * Add roles
   *
   * @param Role $role
   *
   * @return $this
   */
  public function addRole(Role $role)
  {
    $this->roles[] = $role;

    return $this;
  }

  /**
   * Remove roles
   *
   * @param Role $role
   */
  public function removeRole(Role $role)
  {
    $this->roles->removeElement($role);
  }

  /**
   * Get roles
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getRoles()
  {
    return $this->roles;
  }

  /**
   * Add sponsors
   *
   * @param Sponsor $sponsor
   *
   * @return $this
   */
  public function addSponsor(Sponsor $sponsor)
  {
    $this->sponsors[] = $sponsor;

    return $this;
  }

  /**
   * Remove sponsors
   *
   * @param Sponsor $sponsor
   */
  public function removeSponsor(Sponsor $sponsor)
  {
    $this->sponsors->removeElement($sponsor);
  }

  /**
   * Get sponsors
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getSponsors()
  {
    return $this->sponsors;
  }

  /**
   * Add topics
   *
   * @param Topic $topic
   *
   * @return $this
   */
  public function addTopic(Topic $topic)
  {
    $this->topics[] = $topic;

    return $this;
  }

  /**
   * Remove topics
   *
   * @param Topic $topic
   */
  public function removeTopic(Topic $topic)
  {
    $this->topics->removeElement($topic);
  }

  /**
   * @return mixed
   */
  public function getLabel()
  {
    return $this->label;
  }

  /**
   * @param mixed $label
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }

  /**
   * @return mixed
   */
  public function getEndAt()
  {
    return $this->endAt;
  }

  /**
   * @param mixed $endAt
   */
  public function setEndAt($endAt)
  {
    $this->endAt = $endAt;
  }

  /**
   * @return mixed
   */
  public function getPriority()
  {
    return $this->priority;
  }

  /**
   * @param mixed $priority
   */
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }

  /**
   * @return mixed
   */
  public function getTopics()
  {
    return $this->topics;
  }

  /**
   * @param mixed $topics
   */
  public function setTopics($topics)
  {
    $this->topics = $topics;
  }
}
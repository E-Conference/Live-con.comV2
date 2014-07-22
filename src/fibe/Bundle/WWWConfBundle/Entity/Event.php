<?php

namespace fibe\Bundle\WWWConfBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use fibe\Bundle\WWWConfBundle\Entity\VEvent;


use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

use fibe\Bundle\WWWConfBundle\Util\StringTools;


/**
 * Event
 *
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 * @ORM\Table(name="Event")
 * @ORM\Entity(repositoryClass="fibe\Bundle\WWWConfBundle\Repository\EventRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Event extends VEvent
{
  /**
   * The parent of the event
   *
   * @ORM\ManyToOne(targetEntity="fibe\Bundle\WWWConfBundle\Entity\Event", inversedBy="children", cascade={"persist","detach"})
   * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="SET NULL", nullable=true)
   * @Expose
   */
  protected $parent;

  /**
   * The events who are children
   *
   * @ORM\OneToMany(targetEntity="fibe\Bundle\WWWConfBundle\Entity\Event", mappedBy="parent", cascade={"persist"})
   * @Expose
   */
  protected $children;

  /**
   * Main Event
   *
   * @ORM\ManyToOne(targetEntity="fibe\Bundle\WWWConfBundle\Entity\MainEvent", inversedBy="events", cascade={"persist"})
   * @ORM\JoinColumn(name="mainevent_id", referencedColumnName="id")
   * @Expose
   */
  private $mainEvent;

  /**
   * Is an all day event
   * Used for ui representation in the calendar view
   *
   * @ORM\Column(name="is_allday", type="boolean")
   * @Expose
   */
  private $isAllDay;

  /**
   * @TODO EVENT : à mettre dans MainEvent
   *
   * @ORM\Column(type="string", length=128, nullable=true)
   */
  protected $acronym;

  /**
   * @ORM\Column(type="string", length=128, nullable=true)
   */
  protected $slug;

  /**
   * if an event has dtend = dtstart (is instant...)
   *
   * @TODO EVENT : ne pas persisté... ?
   *
   * @ORM\Column(name="is_instant", type="boolean")
   */
  protected $isInstant;


  /**
   * Papers presented at an event
   *
   * @ORM\ManyToMany(targetEntity="Paper", inversedBy="events", cascade={"persist"})
   * @ORM\JoinTable(name="event_paper",
   *     joinColumns={@ORM\JoinColumn(name="event_id", referencedColumnName="id")},
   *     inverseJoinColumns={@ORM\JoinColumn(name="paper_id", referencedColumnName="id")})
   * @Expose
   */
  private $papers;

  /**
   * @ORM\ManyToMany(targetEntity="Topic", inversedBy="events", cascade={"persist"})
   * @ORM\JoinTable(name="event_topic",
   *     joinColumns={@ORM\JoinColumn(name="event_id", referencedColumnName="id")},
   *     inverseJoinColumns={@ORM\JoinColumn(name="topic_id", referencedColumnName="id")})
   * @Expose
   */
  private $topics;



  /**
   * Constructor
   */
  public function __construct()
  {
    parent::__construct();
    $this->papers = new \Doctrine\Common\Collections\ArrayCollection();
    $this->topics = new \Doctrine\Common\Collections\ArrayCollection();
    $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
  }

  /**
   * Slugify
   * @ORM\PrePersist()
   */
  public function slugify()
  {
    $this->setSlug(StringTools::slugify($this->getId() . $this->getSummary()));
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
    $this->setIsInstant($this->getEndAt()->format('U') == $this->getStartAt()->format('U'));

    //events that aren't leaf in the hierarchy can't have a location
    if ($this->hasChildren() && $this->getLocation() != null)
    {
      $this->setLocation(null);
    }

    //ensure main conf has correct properties
    if ($this->isMainConfEvent) //@TODO EVENT
    {
      $this->fitChildrenDate(true);
      if ($this->getEndAt()->getTimestamp() <= $this->getStartAt()->getTimestamp())
      {
        $endAt = clone $this->getStartAt();
        $this->setEndAt($endAt->add(new \DateInterval('P1D')));
      }
      $this->setIsInstant(false);
    }
  }


  /**
   * Ensure main conf event fits its children dates
   *
   * @param bool $allDay
   *
   * @return bool
   */
  public function fitChildrenDate($allDay = false)
  {
    $earliestStart = new \DateTime('6000-10-10');
    $latestEnd = new \DateTime('1000-10-10');
    foreach ($this->getChildren() as $child)
    {
      if ($child->getIsInstant())
      {
        continue;
      }
      if ($child->getStartAt() < $earliestStart)
      {
        $earliestStart = $child->getStartAt();
      }
      if ($child->getEndAt() > $latestEnd)
      {
        $latestEnd = $child->getEndAt();
      }
    }
    if ($earliestStart == new \DateTime('6000-10-10') || $latestEnd == new \DateTime('1000-10-10'))
    {
      return;
    }
    if ($earliestStart == $latestEnd)
    {
      $latestEnd->add(new \DateInterval('P1D'));
    }
    if ($earliestStart->getTimestamp() != $this->getStartAt()->getTimestamp() || $latestEnd->getTimestamp() != $this->getEndAt()->getTimestamp())
    {
      $this->setStartAt($earliestStart);
      $this->setEndAt($latestEnd);

      return true;
    }
  }

  /**
   * Set slug
   *
   * @param string $slug
   *
   * @return ConfEvent
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
    $this->slugify();

    return $this->slug;
  }

  /** computeIsAllDay
   *
   * this is only computed on creation for the importer
   * @ORM\PrePersist()
   */
  public function computeIsAllDay()
  {
    if ($this->isMainConfEvent) //@TODO EVENT
    {
      $this->setIsAllDay(true);
    }
  }

  /**
   * Set url
   *
   * @param string $url
   *
   * @return ConfEvent
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
   * Set conference
   *
   * @param \fibe\Bundle\WWWConfBundle\Entity\MainEvent $conference
   *
   * @return ConfEvent
   */
  public function setConference(\fibe\Bundle\WWWConfBundle\Entity\MainEvent $conference)
  {
    $this->conference = $conference;

    return $this;
  }

  /**
   * Get conference
   *
   * @return \fibe\Bundle\WWWConfBundle\Entity\MainEvent
   */
  public function getConference()
  {
    return $this->conference;
  }

  /**
   * Add papers
   *
   * @param \fibe\Bundle\WWWConfBundle\Entity\Paper $papers
   *
   * @return ConfEvent
   */
  public function addPaper(\fibe\Bundle\WWWConfBundle\Entity\Paper $papers)
  {
    $this->papers[] = $papers;

    return $this;
  }

  /**
   * Remove papers
   *
   * @param \fibe\Bundle\WWWConfBundle\Entity\Paper $papers
   */
  public function removePaper(\fibe\Bundle\WWWConfBundle\Entity\Paper $papers)
  {
    $this->papers->removeElement($papers);
  }

  /**
   * Get papers
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getPapers()
  {
    return $this->papers;
  }

  /**
   * Add topics
   *
   * @param \fibe\Bundle\WWWConfBundle\Entity\Topic $topics
   *
   * @return ConfEvent
   */
  public function addTopic(\fibe\Bundle\WWWConfBundle\Entity\Topic $topics)
  {
    $this->topics[] = $topics;

    return $this;
  }

  /**
   * Remove topics
   *
   * @param \fibe\Bundle\WWWConfBundle\Entity\Topic $topics
   */
  public function removeTopic(\fibe\Bundle\WWWConfBundle\Entity\Topic $topics)
  {
    $this->topics->removeElement($topics);
  }

  /**
   * Get topics
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getTopics()
  {
    return $this->topics;
  }

  /**
   * Set isAllDay
   *
   * @param string $isAllDay
   *
   * @return ConfEvent
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
   * Set isMainConfEvent
   *
   * @param string $isMainConfEvent
   *
   * @return ConfEvent
   */
  public function setIsMainConfEvent($isMainConfEvent)
  {
    $this->isMainConfEvent = $isMainConfEvent;

    return $this;
  }

  /**
   * Get isMainConfEvent
   *
   * @return string
   */
  public function getIsMainConfEvent()
  {
    return $this->isMainConfEvent;
  }

  /**
   * Set isInstant
   *
   * @param string $isInstant
   *
   * @return ConfEvent
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
   * Set acronym
   *
   * @param string $acronym
   *
   * @return ConfEvent
   */
  public function setAcronym($acronym)
  {
    $this->acronym = $acronym;

    return $this;
  }

  /**
   * Get acronym
   *
   * @return string
   */
  public function getAcronym()
  {
    return $this->acronym;
  }

  /**
   * Set parent
   *
   * @param ConfEvent $parent
   *
   * @return ConfEvent
   */
  public function setParent(ConfEvent $parent = null)
  {
    $this->parent = $parent;

    return $this;
  }

  /**
   * Get parent
   *
   * @return ConfEvent
   */
  public function getParent()
  {
    return $this->parent;
  }

  /**
   * Add children
   *
   * @param ConfEvent $children
   *
   * @return ConfEvent
   */
  public function addChildren(ConfEvent $children)
  {
    $this->children[] = $children;

    return $this;
  }

  /**
   * Remove children
   *
   * @param ConfEvent $children
   */
  public function removeChildren(ConfEvent $children)
  {
    $this->children->removeElement($children);
  }

  /**
   * Get children
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getChildren()
  {
    return $this->children;
  }

  /**
   * Has children
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function hasChildren()
  {
    return count($this->children) != 0;
  }

}

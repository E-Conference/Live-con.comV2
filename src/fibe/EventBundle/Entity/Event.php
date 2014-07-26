<?php

namespace fibe\EventBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use fibe\ContentBundle\Util\StringTools;
use Symfony\Component\Validator\Constraints as Assert;



use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;



/**
 * Event
 *
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="fibe\EventBundle\Repository\EventRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Event extends VEvent
{
  /**
   * The parent of the event
   *
   * @ORM\ManyToOne(targetEntity="fibe\EventBundle\Entity\Event", inversedBy="children", cascade={"persist","detach"})
   * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="SET NULL", nullable=true)
   * @Expose
   */
  protected $parent;

  /**
   * The events who are children
   *
   * @ORM\OneToMany(targetEntity="fibe\EventBundle\Entity\Event", mappedBy="parent", cascade={"persist"})
   * @Expose
   */
  protected $children;

  /**
   * Main Event
   *
   * @ORM\ManyToOne(targetEntity="fibe\EventBundle\Entity\MainEvent", inversedBy="events", cascade={"persist"})
   * @ORM\JoinColumn(name="mainevent_id", referencedColumnName="id")
   * @Expose
   */
  private $mainEvent;

  /**
   * @ORM\Column(type="string", length=128, nullable=true)
   */
  protected $slug;


  /**
   * Papers presented at an event
   *
   * @ORM\ManyToMany(targetEntity="fibe\ContentBundle\Entity\Paper", inversedBy="events", cascade={"persist"})
   * @ORM\JoinTable(name="event_paper",
   *     joinColumns={@ORM\JoinColumn(name="event_id", referencedColumnName="id")},
   *     inverseJoinColumns={@ORM\JoinColumn(name="paper_id", referencedColumnName="id")})
   * @Expose
   */
  private $papers;



  /**
   * Constructor
   */
  public function __construct()
  {
    parent::__construct();
    $this->papers = new ArrayCollection();
    $this->children = new ArrayCollection();
    $this->categories = new ArrayCollection();
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
//    if ($this->isMainVEvent) //@TODO EVENT
//    {
//      $this->fitChildrenDate(true);
//      if ($this->getEndAt()->getTimestamp() <= $this->getStartAt()->getTimestamp())
//      {
//        $endAt = clone $this->getStartAt();
//        $this->setEndAt($endAt->add(new \DateInterval('P1D')));
//      }
//      $this->setIsInstant(false);
//    }
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
   * @return VEvent
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
    if ($this->isMainVEvent) //@TODO EVENT
    {
      $this->setIsAllDay(true);
    }
  }

  /**
   * Set url
   *
   * @param string $url
   *
   * @return VEvent
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
   * @param \fibe\ConferenceBundle\Entity\MainEvent $conference
   *
   * @return VEvent
   */
  public function setConference(\fibe\ConferenceBundle\Entity\MainEvent $conference)
  {
    $this->conference = $conference;

    return $this;
  }

  /**
   * Get conference
   *
   * @return \fibe\ConferenceBundle\Entity\MainEvent
   */
  public function getConference()
  {
    return $this->conference;
  }

  /**
   * Add papers
   *
   * @param \fibe\EventBundle\Entity\Paper $papers
   *
   * @return VEvent
   */
  public function addPaper(\fibe\EventBundle\Entity\Paper $papers)
  {
    $this->papers[] = $papers;

    return $this;
  }

  /**
   * Remove papers
   *
   * @param \fibe\EventBundle\Entity\Paper $papers
   */
  public function removePaper(\fibe\EventBundle\Entity\Paper $papers)
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
   * @param \fibe\EventBundle\Entity\Topic $topics
   *
   * @return VEvent
   */
  public function addTopic(\fibe\EventBundle\Entity\Topic $topics)
  {
    $this->topics[] = $topics;

    return $this;
  }

  /**
   * Remove topics
   *
   * @param \fibe\EventBundle\Entity\Topic $topics
   */
  public function removeTopic(\fibe\EventBundle\Entity\Topic $topics)
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
   * Set parent
   *
   * @param VEvent $parent
   *
   * @return VEvent
   */
  public function setParent(VEvent $parent = null)
  {
    $this->parent = $parent;

    return $this;
  }

  /**
   * Get parent
   *
   * @return VEvent
   */
  public function getParent()
  {
    return $this->parent;
  }

  /**
   * Add children
   *
   * @param VEvent $children
   *
   * @return VEvent
   */
  public function addChildren(VEvent $children)
  {
    $this->children[] = $children;

    return $this;
  }

  /**
   * Remove children
   *
   * @param VEvent $children
   */
  public function removeChildren(VEvent $children)
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

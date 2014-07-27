<?php

namespace fibe\ContentBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use fibe\EventBundle\Entity\Event;
use Symfony\Component\Validator\Constraints as Assert;

use fibe\EventBundle\Entity\MainEvent;
use fibe\EventBundle\Entity\VEvent;
use fibe\CommunityBundle\Entity\Person;
use fibe\ContentBundle\Util\StringTools;

/**
 * Paper entity
 *
 * @ORM\Table(name="paper")
 * @ORM\Entity(repositoryClass="fibe\ContentBundle\Repository\PaperRepository")
 * @ORM\HasLifecycleCallbacks
 *
 */
class Paper
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * label (or title of the paper)
   *
   * @ORM\Column(type="string")
   */
  private $label;

  /**
   * abstract
   * events in datasets may don't have abstract
   *
   * @ORM\Column(type="text", name="abstract", nullable=true)
   */
  private $abstract;

  /**
   * Url for the paper
   *
   * @ORM\Column(type="string", nullable=true)
   */
  private $url;

  /**
   * Authors : Persons related to an event
   *
   * @ORM\ManyToMany(targetEntity="fibe\CommunityBundle\Entity\Person", inversedBy="papers", cascade={"persist", "merge", "remove"})
   * @ORM\JoinTable(
   *     joinColumns={@ORM\JoinColumn(name="paper_id", referencedColumnName="id", onDelete="Cascade")},
   *     inverseJoinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id", onDelete="Cascade")})
   */
  private $authors;

  /**
   * The label of the publisher
   *
   * @ORM\Column(type="string", nullable=true, name="publisher")
   */
  private $publisher;

  /**
   * The date of the publication
   *
   * @ORM\Column(type="string", nullable=true, name="publishDate")
   */
  private $publishDate;

  /**
   * The topics of the paper
   *
   * @ORM\ManyToMany(targetEntity="Topic", inversedBy="papers", cascade={"persist", "remove"})
   * @ORM\JoinTable(name="paper_topic",
   *     joinColumns={@ORM\JoinColumn(name="paper_id", referencedColumnName="id")},
   *     inverseJoinColumns={@ORM\JoinColumn(name="topic_id", referencedColumnName="id")})
   */
  private $topics;

  /**
   * Events related to the paper
   *
   * @ORM\ManyToMany(targetEntity="fibe\EventBundle\Entity\VEvent", mappedBy="paper", cascade={"persist"})
   */
  private $events;

  /**
   *  MainEvent associated to this paper
   *
   * @ORM\ManyToOne(targetEntity="fibe\EventBundle\Entity\MainEvent", inversedBy="paper", cascade={"persist"})
   * @ORM\JoinColumn(name="main_event_id", referencedColumnName="id")
   *
   */
  private $mainEvent;

  /**
   * @ORM\Column(type="string", length=256, nullable=true)
   */
  private $slug;

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->authors = new ArrayCollection();
    $this->topics = new ArrayCollection();
    $this->events = new ArrayCollection();
  }

  /**
   * __toString method
   *
   * @return mixed
   */
  public function __toString()
  {
    return $this->label;
  }

  /**
   * Slugify
   *
   * @ORM\PrePersist()
   */
  public function slugify()
  {
    $this->setSlug(StringTools::slugify($this->getId() . $this->getLabel()));
  }

  /**
   * onUpdate
   *
   * @ORM\PostPersist()
   * @ORM\PreUpdate()
   */
  public function onUpdate()
  {
    $this->slugify();
  }

  /**
   * Set slug
   *
   * @param string $slug
   *
   * @return string
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
   * @param string $label
   *
   * @return Paper
   */
  public function setLabel($label)
  {
    $this->label = $label;

    return $this;
  }

  /**
   * Get label
   *
   * @return string
   */
  public function getLabel()
  {
    return $this->label;
  }

  /**
   * Set abstract
   *
   * @param string $abstract
   *
   * @return Paper
   */
  public function setAbstract($abstract)
  {
    $this->abstract = $abstract;

    return $this;
  }

  /**
   * Get abstract
   *
   * @return string
   */
  public function getAbstract()
  {
    return $this->abstract;
  }

  /**
   * Set url
   *
   * @param string $url
   *
   * @return Paper
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
   * Set publisher
   *
   * @param string $publisher
   *
   * @return Paper
   */
  public function setPublisher($publisher)
  {
    $this->publisher = $publisher;

    return $this;
  }

  /**
   * Get publisher
   *
   * @return string
   */
  public function getPublisher()
  {
    return $this->publisher;
  }

  /**
   * Set publishDate
   *
   * @param string $publishDate
   *
   * @return Paper
   */
  public function setPublishDate($publishDate)
  {
    $this->publishDate = $publishDate;

    return $this;
  }

  /**
   * Get publishDate
   *
   * @return string
   */
  public function getPublishDate()
  {
    return $this->publishDate;
  }

  /**
   * Add authors
   *
   * @param Person $authors
   *
   * @return Paper
   */
  public function addAuthor(Person $authors)
  {
    $this->authors[] = $authors;

    return $this;
  }

  /**
   * Remove authors
   *
   * @param Person $authors
   */
  public function removeAuthor(Person $authors)
  {
    $this->authors->removeElement($authors);
  }

  /**
   * Get authors
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getAuthors()
  {
    return $this->authors;
  }

  /**
   * Add topics
   *
   * @param Topic $topics
   *
   * @return Paper
   */
  public function addTopic(Topic $topics)
  {
    $this->topics[] = $topics;

    return $this;
  }

  /**
   * Remove topics
   *
   * @param Topic $topics
   */
  public function removeTopic(Topic $topics)
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
   * Add events
   *
   * @param Event $events
   *
   * @return Paper
   */
  public function addEvent(Event $events)
  {
    $this->events[] = $events;

    return $this;
  }

  /**
   * Remove events
   *
   * @param Event $events
   */
  public function removeEvent(Event $events)
  {
    $this->events->removeElement($events);
  }

  /**
   * Get events
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getEvents()
  {
    return $this->events;
  }

  /**
   * Set mainEvent
   *
   * @param MainEvent $mainEvent
   *
   * @return Paper
   */
  public function setMainEvent(MainEvent $mainEvent = null)
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

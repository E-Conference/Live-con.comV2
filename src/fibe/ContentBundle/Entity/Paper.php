<?php

namespace fibe\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use fibe\EventBundle\Entity\MainEvent;
use fibe\EventBundle\Entity\VEvent;
use fibe\CommunityBundle\Entity\Person;
use fibe\ContentBundle\Entity\Topic;
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
   * @ORM\ManyToMany(targetEntity="Person", inversedBy="paper", cascade={"persist", "merge"})
   * @ORM\JoinTable(
   *     joinColumns={@ORM\JoinColumn(name="paper_id", referencedColumnName="id", onDelete="Cascade")},
   *     inverseJoinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id", onDelete="Cascade")})
   */
  protected $authors;

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
   * @ORM\ManyToMany(targetEntity="Topic", inversedBy="paper", cascade={"persist"})
   * @ORM\JoinTable(name="paper_topic",
   *     joinColumns={@ORM\JoinColumn(name="paper_id", referencedColumnName="id", onDelete="Cascade")},
   *     inverseJoinColumns={@ORM\JoinColumn(name="topic_id", referencedColumnName="id", onDelete="Cascade")})
   */
  protected $topics;

  /**
   * Events related to the paper
   *
   * @ORM\ManyToMany(targetEntity="VEvent", mappedBy="paper", cascade={"persist"})
   */
  protected $events;

  /**
   *  MainEvent associated to this paper
   *
   * @ORM\ManyToOne(targetEntity="fibe\EventBundle\Entity\MainEvent", inversedBy="paper", cascade={"persist"})
   * @ORM\JoinColumn(name="main_event_id", referencedColumnName="id")
   *
   */
  protected $mainEvent;

  /**
   * @ORM\Column(type="string", length=256, nullable=true)
   */
  protected $slug;

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->authors = new \Doctrine\Common\Collections\ArrayCollection();
    $this->topic = new \Doctrine\Common\Collections\ArrayCollection();
    $this->events = new \Doctrine\Common\Collections\ArrayCollection();
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
   * @param \fibe\CommunityBundle\Entity\Person $authors
   *
   * @return Paper
   */
  public function addAuthor(\fibe\CommunityBundle\Entity\Person $authors)
  {
    $this->authors[] = $authors;

    return $this;
  }

  /**
   * Remove authors
   *
   * @param \fibe\CommunityBundle\Entity\Person $authors
   */
  public function removeAuthor(\fibe\Bundle\CommunityBundle\Entity\Person $authors)
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
   * @param \fibe\ContentBundle\Entity\Topic $topics
   *
   * @return Paper
   */
  public function addTopic(\fibe\ContentBundle\Entity\Topic $topics)
  {
    $this->topics[] = $topics;

    return $this;
  }

  /**
   * Remove topics
   *
   * @param \fibe\ContentBundle\Entity\Topic $topics
   */
  public function removeTopic(\fibe\ContentBundle\Entity\Topic $topics)
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
   * @param \fibe\EventBundle\Entity\VEvent $events
   *
   * @return Paper
   */
  public function addEvent(\fibe\EventBundle\Entity\VEvent $events)
  {
    $this->events[] = $events;

    return $this;
  }

  /**
   * Remove events
   *
   * @param \fibe\EventBundle\Entity\VEvent $events
   */
  public function removeEvent(\fibe\EventBundle\Entity\VEvent $events)
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
   * Set conference
   *
   * @param \fibe\EventBundle\Entity\MainEvent $conference
   *
   * @return Paper
   */
  public function setConference(\fibe\EventBundle\Entity\MainEvent $conference = null)
  {
    $this->conference = $conference;

    return $this;
  }

  /**
   * Get conference
   *
   * @return \fibe\EventBundle\Entity\MainEvent
   */
  public function getConference()
  {
    return $this->conference;
  }
}

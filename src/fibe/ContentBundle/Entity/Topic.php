<?php

namespace fibe\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use fibe\ContentBundle\Util\StringTools;


/**
 * This entity define a topic
 *
 * @ORM\Table(name="topic")
 * @ORM\Entity(repositoryClass="fibe\ContentBundle\Repository\TopicRepository")
 * @ORM\HasLifecycleCallbacks
 *
 */
class Topic
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * label
   *
   * @ORM\Column(type="string")
   */
  protected $label;

  /**
   * Papers related to thise topic
   *
   * @ORM\ManyToMany(targetEntity="Paper", mappedBy="topics", cascade={"persist"})
   */
  private $papers;

  /**
   * Events related to this topic
   *
   * @ORM\ManyToMany(targetEntity="Event", mappedBy="topics", cascade={"persist"})
   */
  private $events;

  /**
   * Topics associated to this conference
   *
   * @ORM\ManyToOne(targetEntity="fibe\EventBundle\Entity\MainEvent", inversedBy="topics", cascade={"persist"})
   * @ORM\JoinColumn(name="main_event_id", referencedColumnName="id")
   *
   */
  protected $mainEvent;

  /**
   * @ORM\Column(type="string", length=128, nullable=true)
   */
  protected $slug;

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->papers = new \Doctrine\Common\Collections\ArrayCollection();
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
   * Add papers
   *
   * @param \fibe\ContentBundle\Entity\Paper $papers
   *
   * @return Topic
   */
  public function addPaper(\fibe\ContentBundle\Entity\Paper $papers)
  {
    $this->papers[] = $papers;

    return $this;
  }

  /**
   * Remove papers
   *
   * @param \fibe\ContentBundle\Entity\Paper $papers
   */
  public function removePaper(\fibe\ContentBundle\Entity\Paper $papers)
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
   * Add events
   *
   * @param \fibe\EventBundle\Entity\VEvent $events
   *
   * @return Topic
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
  public function removeEvent(\fibe\ContentBundle\Entity\VEvent $events)
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
   * Set label
   *
   * @param string $label
   *
   * @return Topic
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
   * Set conference
   *
   * @param \fibe\EventBundle\Entity\MainEvent $conference
   *
   * @return Topic
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
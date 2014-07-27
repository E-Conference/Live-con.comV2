<?php

namespace fibe\CommunityBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;
use Symfony\Component\Validator\Constraints as Assert;

use fibe\Bundle\WWWConfBundle\Util\StringTools;

/**
 *
 * @ORM\Table(name="organization")
 * @ORM\Entity(repositoryClass="fibe\Bundle\WWWConfBundle\Repository\OrganizationRepository")
 * @ORM\HasLifecycleCallbacks
 * @ExclusionPolicy("all") 
 *
 */
class Company
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   * @Expose
   */
  protected $id;

  /**
   * label
   *
   * @ORM\Column(type="string")
   * @Expose
   */
  protected $label;

  /**
   * Sponsors
   *
   * @ORM\OneToMany(targetEntity="fibe\ContentBundle\Entity\Sponsor", mappedBy="company",cascade={"persist", "remove"})
   */
  private $sponsors;

  /**
   * Additional Infomations of the company
   *
   * @ORM\ManyToOne(targetEntity="fibe\CommunityBundle\Entity\AdditionalInformations", cascade={"persist"})
   * @ORM\JoinColumn(name="additional_information_id", referencedColumnName="id")
   *
   */
  protected $additionalInformation;

  /**
   * @ORM\ManyToMany(targetEntity="Person",  mappedBy="companies", cascade={"persist","merge","remove"})
   * @Expose
   */
  protected $members;

  /**
   * Company related to a mainEvent
   *
   * @ORM\ManyToOne(targetEntity="fibe\EventBundle\Entity\MainEvent", inversedBy="companies", cascade={"persist"})
   * @ORM\JoinColumn(name="conference_id", referencedColumnName="id")
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
    $this->members = new ArrayCollection();
    $this->sponsors = new ArrayCollection();
  }

  /**
   * Method to string for the entity
   *
   * @return mixed
   */
  public function __toString()
  {
    return $this->label;
  }

  /**
   * Slugify
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
   * @return $this
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
   * @return $this
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
   * Add members
   *
   * @param Person $members
   *
   * @return $this
   */
  public function addMember(Person $members)
  {
    $this->members[] = $members;

    return $this;
  }

  /**
   * Remove members
   *
   * @param Person $members
   */
  public function removeMember(Person $members)
  {
    $this->members->removeElement($members);
  }

  /**
   * Get members
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getMembers()
  {
    return $this->members;
  }

  /**
   * @param MainEvent $mainEvent
   * @return $this
   */
  public function setConference(MainEvent $mainEvent)
  {
    $this->mainEvent = $mainEvent;

    return $this;
  }

  /**
   * Get conference
   *
   * @return MainEvent
   */
  public function getMainEvent()
  {
    return $this->mainEvent;
  }

  /**
   * @return mixed
   */
  public function getAdditionalInformation()
  {
    return $this->additionalInformation;
  }

  /**
   * @param mixed $additionalInformation
   */
  public function setAdditionalInformation($additionalInformation)
  {
    $this->additionalInformation = $additionalInformation;
  }
}

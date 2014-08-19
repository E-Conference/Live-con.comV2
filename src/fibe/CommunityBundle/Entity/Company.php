<?php

namespace fibe\CommunityBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Mapping as ORM;


use fibe\ContentBundle\Util\StringTools;
use fibe\EventBundle\Entity\MainEvent;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\VirtualProperty;
use Symfony\Component\Validator\Constraints as Assert;


/**
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="fibe\CommunityBundle\Repository\CompanyRepository")
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
  private $id;

  /**
   * label
   *
   * @ORM\Column(type="string")
   * @Expose
   */
  private $label;


  /**
   * Sponsors
   *
   * @ORM\OneToMany(targetEntity="fibe\ContentBundle\Entity\Sponsor", mappedBy="company", cascade={"all"})
   */
  private $sponsors;

  /**
   * Additional Infomations of the company
   *
   * @ORM\OneToOne(targetEntity="AdditionalInformations", mappedBy="company", cascade={"all"}, fetch="EAGER")
   * @ORM\JoinColumn(name="additional_information_id", referencedColumnName="id", onDelete="CASCADE")
   * @Expose
   * @SerializedName("additionalInformation")
   */
  private $additionalInformation;

  /**
   * @ORM\ManyToMany(targetEntity="Person",  mappedBy="companies", cascade={"all"})
   */
  private $members;

  /**
   * @ORM\Column(type="string", length=256, nullable=true)
   */
  private $slug;

  /**
   * The mainEvent associated
   *
   * @ORM\ManyToOne(targetEntity="fibe\EventBundle\Entity\MainEvent", inversedBy="companies", cascade={"persist"})
   * @ORM\JoinColumn(name="main_event_id", referencedColumnName="id")
   */
  private $mainEvent;

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
   * auto persist of embedded data
   * @ORM\PreFlush
   */
  public function updateSomething(PreFlushEventArgs $eventArgs)
  {
    if(!$this->getId()) return;
    $em = $eventArgs->getEntityManager();
    $uow = $em->getUnitOfWork();
    $uow->recomputeSingleEntityChangeSet(
      $em->getClassMetadata(get_class($this->getAdditionalInformation())),
      $this->getAdditionalInformation()
    );
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
     * Set id
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
  public function setMainEvent(MainEvent $mainEvent)
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
  public function setAdditionalInformation(AdditionalInformations $additionalInformation)
  {
    $this->additionalInformation = $additionalInformation;
  }
}

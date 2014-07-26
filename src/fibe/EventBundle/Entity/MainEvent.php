<?php

namespace fibe\EventBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use fibe\EventBundle\Entity\VEvent;
use JMS\Serializer\Annotation\Expose;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use fibe\EventBundle\Util\StringTools;

/**
 * Main Event entity
 *
 * @ORM\Entity
 * @ORM\Table(name="mainEvent")
 * @ORM\Entity(repositoryClass="fibe\EventBundle\Repository\MainEventRepository")
 * @ORM\HasLifecycleCallbacks
 */
class MainEvent extends VEvent
{

  /**
   * @ORM\OneToOne(targetEntity="fibe\ContentBundle\Entity\Module",cascade={ "remove"})
   */
  private $module;

  /**
   * Events
   *
   * @ORM\OneToMany(targetEntity="fibe\EventBundle\Entity\Event", mappedBy="mainEvent",cascade={"persist", "remove"})
   */
  private $events;

  /**
   * Locations
   *
   * @ORM\OneToMany(targetEntity="fibe\ContentBundle\Entity\Location", mappedBy="mainEvent",cascade={"persist", "remove"})
   */
  private $locations;

  /**
   * Papers
   *
   * @ORM\OneToMany(targetEntity="fibe\ContentBundle\Entity\Paper", mappedBy="mainEvent",cascade={"persist", "remove"})
   */
  private $papers;

  /**
   * Roles
   *
   * @ORM\OneToMany(targetEntity="fibe\ContentBundle\Entity\Role", mappedBy="mainEvent",cascade={"persist", "remove"})
   */
  private $roles;

  /**
   * Companies
   *
   * @ORM\OneToMany(targetEntity="fibe\CommunityBundle\Entity\Company", mappedBy="mainEvent",cascade={"persist", "remove"})
   */
  private $companies;

  /**
   * Topics
   *
   * @ORM\OneToMany(targetEntity="fibe\ContentBundle\Entity\Topic", mappedBy="mainEvent",cascade={"persist", "remove"})
   */
  private $topics;

  /**
   * Sponsors
   *
   * @ORM\OneToMany(targetEntity="fibe\CommunityBundle\Entity\Sponsor", mappedBy="mainEvent",cascade={"persist", "remove"})
   */
  private $sponsors;

  /**
   *
   * @ORM\ManyToMany(targetEntity="fibe\EventBundle\Entity\Person",  mappedBy="mainEvents", cascade={"persist","merge","remove"})
   * @Expose
   */
  private $persons;

  /**
   * Team
   *
   * @ORM\OneToOne(targetEntity="fibe\SecurityBundle\Entity\Team",cascade={"persist", "remove"})
   */
  private $team;

  /**
   * mappingFiles
   *
   * @ORM\OneToMany(targetEntity="fibe\EventBundle\Entity\MainEventSettings", mappedBy="mainEvent",cascade={"persist", "remove"})
   */
  private $settings;

  /**
   * @var UploadedFile
   * @Assert\File(maxSize="2M",
   *   mimeTypes = {"image/jpeg", "image/png", "image/gif", "image/jpg"},
   *   mimeTypesMessage = "The file must be an image"
   * )
   */
  private $logo;

  /**
   * @var String
   * @ORM\Column(name="logoPath", type="string", length=255,nullable=true)
   */
  private $logoPath;

  /**
   * @ORM\Column(type="string", length=256, nullable=true)
   */
  protected $slug;

  /**
   *
   * @ORM\Column(type="string", length=128, nullable=true)
   */
  protected $acronym;

  /**
   * @return string
   */
  public function __toString()
  {
    return $this->getSummary();

  }

  /**
   * Slugify
   *
   */
  public function slugify()
  {
    $this->setSlug(StringTools::slugify($this->getId() . $this->getSummary()));

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
    return $this->slug;
  }


  /**
   * Return the id of the conference
   *
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }


  /**
   * Sets file.
   *
   * @param \Symfony\Component\HttpFoundation\File\UploadedFile $logo
   * @return $this
   */
  public function setLogo(UploadedFile $logo = null)
  {
    $this->logo = $logo;

    return $this;
  }


  /**
   * Get file.
   *
   * @return UploadedFile
   */
  public function getLogo()
  {
    return $this->logo;
  }


  /**
   * Set the path of the confgerence's logo
   *
   * @param $logoPath
   *
   * @return $this
   */
  public function setLogoPath($logoPath)
  {
    $this->logoPath = $logoPath;
    return $this;
  }

  /**
   * Return the path of the confgerence's logo
   *
   * @return String
   */
  public function LogoPath()
  {
    return $this->logoPath;
  }

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->events = new ArrayCollection();
    $this->confManagers = new ArrayCollection();
    $this->roles = new ArrayCollection();
    $this->locations = new ArrayCollection();
    $this->papers = new ArrayCollection();
    $this->persons= new ArrayCollection();
    $this->topics= new ArrayCollection();
    $this->sponsors= new ArrayCollection();
    $this->companies= new ArrayCollection();
  }

  /**
   * Add locations
   *
   * @param Location $locations
   *
   * @return $this
   */
  public function addLocation(Location $locations)
  {
    $this->locations[] = $locations;

    return $this;
  }

  /**
   * Remove locations
   *
   * @param Location $locations
   */
  public function removeLocation(Location $locations)
  {
    $this->locations->removeElement($locations);
  }

  /**
   * Get locations
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getLocations()
  {
    return $this->locations;
  }

  /**
   * Add papers
   *
   * @param Paper $papers
   *
   * @return $this
   */
  public function addPaper(Paper $papers)
  {
    $this->papers[] = $papers;

    return $this;
  }

  /**
   * Remove papers
   *
   * @param Paper $papers
   */
  public function removePaper(Paper $papers)
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
   * Add persons
   *
   * @param Person $persons
   *
   * @return $this
   */
  public function addPerson(Person $persons)
  {
    $this->persons[] = $persons;

    return $this;
  }

  /**
   * Remove persons
   *
   * @param Person $persons
   */
  public function removePerson(Person $persons)
  {
    $this->persons->removeElement($persons);
  }

  /**
   * Get persons
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getPersons()
  {
    return $this->persons;
  }

  /**
   *
   * @param \fibe\SecurityBundle\Entity\Team $team
   *
   * @return $this
   */
  public function setTeam($team)
  {
    $this->team = $team;

    return $this;
  }
  /**
   *
   * @return \fibe\SecurityBundle\Entity\Team
   */
  public function getTeam()
  {
    return $this->team;
  }

  /**
   * Add app config
   *
   * @param \fibe\MobileAppBundle\Entity\MobileAppConfig $AppConfig
   *
   * @return $this
   */
  public function setAppConfig($AppConfig)
  {
    if($AppConfig)
    {
      $AppConfig->setMainEvent($this);
    }
    $this->appConfig = $AppConfig;

    return $this;
  }

  public function getAppConfig()
  {
    return $this->appConfig;
  }


  /**
   * Add topics
   *
   * @param Topic $topics
   *
   * @return $this
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
   * Add sponsors
   *
   * @param Sponsor $sponsor
   * @internal param \fibe\EventBundle\Entity\Sponsor $sponsors
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
   * @param \fibe\EventBundle\Entity\Sponsor $sponsor
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
   * Add organizations
   *
   * @param Company $companies
   *
   * @return $this
   */
  public function addCompany(Company $companies)
  {
    $this->companies[] = $companies;

    return $this;
  }

  /**
   * Remove companies
   *
   * @param Company $companies
   */
  public function removeCompany(Company $companies)
  {
    $this->companies->removeElement($companies);
  }

  /**
   * Get companies
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getCompanies()
  {
    return $this->companies;
  }

  /**
   * Add events
   *
   * @param VEvent $events
   *
   * @return $this
   */
  public function addEvent(VEvent $events)
  {
    $this->events[] = $events;

    return $this;
  }

  /**
   * Remove events
   *
   * @param VEvent $events
   */
  public function removeEvent(VEvent $events)
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
   * Get sub-events
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getSubEvents()
  {
    return $this->events;
//	  $sub_events[] = $this->events;
//	  $sub_events->removeElement($this->mainEvent);
//	  return $sub_events;
  }


  public function uploadLogo()
  {
    // the file property can be empty if the field is not required
    if (null === $this->getLogo())
    {
      return;
    }


    // générer un nom aléatoire et essayer de deviner l'extension (plus sécurisé)
    $extension = $this->getLogo()->guessExtension();
    if (!$extension)
    {
      // l'extension n'a pas été trouvée
      $extension = 'bin';
    }
    $name = $this->getId() . '.' . $extension;
    $this->getLogo()->move($this->getUploadRootDir(), $name);
    $this->setLogoPath($name);
  }

  /**
   * @TODO comment
   *
   * @return string
   */
  protected function getUploadRootDir()
  {
    // the absolute directory path where uploaded
    // documents should be saved
    return __DIR__ . '/../../../../../web/' . $this->getUploadDir();
  }


  /**
   * @TODO comment
   *
   * @return string
   */
  protected function getUploadDir()
  {
    // get rid of the __DIR__ so it doesn't screw up
    // when displaying uploaded doc/image in the view.
    return 'uploads/';
  }

  /**
   * Get logoPath
   *
   * @return string
   */
  public function getLogoPath()
  {
    return $this->logoPath;
  }

  /**
   * @TODO comment
   *
   * @return bool
   */
  public function isEmpty()
  {
    return  (count($this->events)      <= 1)
    and (count($this->locations)     <= 1)
    and (count($this->papers)        == 0)
    and (count($this->persons)       == 0)
    and (count($this->companies)     == 0)
    and (count($this->topics)        == 0);

  }


  /**
   * Set module
   *
   * @param Module $module
   *
   * @return $this
   */
  public function setModule(Module $module = null)
  {
    $this->module = $module;

    return $this;
  }

  /**
   * Get module
   *
   * @return VEvent
   */
  public function getModule()
  {
    return $this->module;
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
}

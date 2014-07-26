<?php

namespace fibe\Bundle\WWWConfBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Expose;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

use fibe\Bundle\WWWConfBundle\Util\StringTools;


/**
 * This entity define a sponsor
 *
 * @ORM\Table(name="sponsor")
 * @ORM\Entity(repositoryClass="fibe\Bundle\WWWConfBundle\Repository\SponsorRepository")
 * @ORM\HasLifecycleCallbacks
 *
 */
class Sponsor
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * Name of the sponsor
   *
   * @ORM\Column(type="string")
   */
  protected $label;

  /**
   * @var UploadedFile
   * @Assert\File(maxSize="2M",
   * mimeTypes = {"image/jpeg", "image/png", "image/gif", "image/jpg"},
   * mimeTypesMessage = "The file must be an image")
   */
  private $logo;

  /**
   * @var String
   * @ORM\Column(name="logoPath", type="string", length=255,nullable=true)
   */
  private $logoPath;

  /**
   * @ORM\Column(type="string", length=128, nullable=true)
   */
  protected $slug;

  /**
   * company
   *
   *
   * @ORM\ManyToOne(targetEntity="fibe\Bundle\WWWConfBundle\Entity\Company", inversedBy="sponsors")
   * @ORM\JoinColumn(name="company_id", referencedColumnName="id", onDelete="Set Null")
   */
  protected $company;

  /**
   * @TODO : manytomany with vevent
   * sponsored event
   * @ORM\ManyToOne(targetEntity="fibe\Bundle\WWWConfBundle\Entity\VEvent", inversedBy="sponsor", cascade={"persist"})
   * @ORM\JoinColumn(name="main_event_id", referencedColumnName="id")
   *
   */
  protected $event;

  /**
   * Events
   * Events related to an paper
   *
   * @ORM\ManyToMany(targetEntity="VEvent", mappedBy="papers", cascade={"persist"})
   */
  protected $events;

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
   * Set Label
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
   * @return mixed
   */
  public function getConference()
  {
    return $this->conference;
  }

  /**
   * @param mixed $conference
   */
  public function setConference($conference)
  {
    $this->conference = $conference;
  }

  /**
   * @return mixed
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * @param mixed $description
   */
  public function setDescription($message)
  {
    $this->description = $message;
  }

  /**
   * @return UploadedFile
   */
  public function getLogo()
  {
    return $this->logo;
  }

  /**
   * @param UploadedFile $logo
   */
  public function setLogo(UploadedFile $logo = null)
  {
    $this->logo = $logo;
  }

  /**
   * @return String
   */
  public function getLogoPath()
  {
    return $this->logoPath;
  }

  /**
   * @param String $logoPath
   */
  public function setLogoPath($logoPath)
  {
    $this->logoPath = $logoPath;
  }

  /**
   * Return the directory where the logo will be store
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
   * The name of the directory where the logo will be store
   *
   * @return string
   */
  protected function getUploadDir()
  {
    // get rid of the __DIR__ so it doesn't screw up
    // when displaying uploaded doc/image in the view.
    return 'uploads/sponsors/';
  }

  /**
   * Upload the logo to the server
   */
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
   * @return mixed
   */
  public function getCompany()
  {
    return $this->company;
  }

  /**
   * @param mixed $company
   */
  public function setCompany($company)
  {
    $this->company = $company;
  }

  /**
   * @return mixed
   */
  public function getEvents()
  {
    return $this->events;
  }

  /**
   * @param mixed $events
   */
  public function setEvents($events)
  {
    $this->events = $events;
  }
}

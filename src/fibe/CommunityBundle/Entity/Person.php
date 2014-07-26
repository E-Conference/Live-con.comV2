<?php

namespace fibe\CommunityBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use fibe\ContentBundle\Entity\Paper;
use fibe\ContentBundle\Entity\Role;
use fibe\ContentBundle\Util\StringTools;
use FOS\UserBundle\Model\UserInterface;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * This entity is based on the specification FOAF.
 *
 * This class define a Person.
 * @ORM\Table(name="person")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="fibe\Bundle\WWWConfBundle\Repository\PersonRepository")
 * @ExclusionPolicy("all") 
 *
 */
class Person
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   * @Expose
   */
  protected $id;

  /**
   * Additional Infomations of the company
   *
   * @ORM\OneToOne(targetEntity="AdditionalInformations", cascade={"persist", "remove"})
   * @ORM\JoinColumn(name="additional_information_id", referencedColumnName="id", onDelete="CASCADE")
   *
   */
  protected $additionalInformation;

  /**
   * @return AdditionalInformations
   */
  public function getAdditionalInformation()
  {
    return $this->additionalInformation;
  }

  /**
   * @param AdditionalInformations $additionalInformation
   */
  public function setAdditionalInformation(AdditionalInformations $additionalInformation)
  {
    $this->additionalInformation = $additionalInformation;
  }

  /**
   * @return mixed
   */
  public function getCompanies()
  {
    return $this->companies;
  }

  /**
   * @param mixed $companies
   */
  public function setCompanies($companies)
  {
    $this->companies = $companies;
  }

  /**
   * technical user
   *
   * @ORM\OneToOne(targetEntity="fibe\SecurityBundle\Entity\User", cascade={"persist", "remove"})
   * @ORM\JoinColumn(name="user_id", referencedColumnName="id", onDelete="CASCADE")
   *
   */
  protected $user;

  /**
   * label
   * Name of the person (Family Name + FirstName)
   * 
   * @ORM\Column(type="string")
   * @Expose
   */
  protected $label;

  /**
   * familyName
   * @Assert\NotBlank(message ="Please give a family name")
   * @ORM\Column(type="string", nullable=true,  name="familyName")
   */
  protected $familyName;

  /**
   * firstName
   * @Assert\NotBlank(message ="Please give a first name")
   * @ORM\Column(type="string", nullable=true,  name="firstName")
   */
  protected $firstName;

  /**
   * description
   *
   * @ORM\Column(type="string", length=1024, nullable=true, name="description")
   * @Expose
   */
  protected $description;

  /**
   * age
   *
   * @ORM\Column(type="integer", nullable=true,  name="age")
   * @Expose
   */
  protected $age;

  /**
   * Paper
   * Paper made by this person
   *
   * @ORM\ManyToMany(targetEntity="fibe\ContentBundle\Entity\Paper",  mappedBy="authors", cascade={"remove","persist","merge"})
   */
  private $papers;

  /**
   * Company
   *
   * @ORM\ManyToMany(targetEntity="Company", inversedBy="members", cascade={"remove","persist","merge"})
   * @ORM\JoinTable(name="member",
   *     joinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id", onDelete="Cascade")})
   *     inverseJoinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id", onDelete="Cascade")},
   * @Expose
   */
  private $companies;

  /**
   * openId
   *
   *
   * @ORM\Column(type="string", nullable=true,  name="openId")
   */
  protected $openId;

  /**
   *
   * @ORM\OneToMany(targetEntity="fibe\ContentBundle\Entity\Role",  mappedBy="person",cascade={"persist","remove"})
   * @ORM\JoinColumn(onDelete="CASCADE")
   *
   */
  private $roles;

  /**
   * @TODO : Difference avec un utilisateur Livecon ? Peut appartenir a plusieurs main events
   *
   * @ORM\ManyToMany(targetEntity="fibe\EventBundle\Entity\MainEvent", inversedBy="persons", cascade={"persist"})
   * @ORM\JoinTable(name="mainevents_persons",
   *     joinColumns={@ORM\JoinColumn(name="mainevent_id", referencedColumnName="id")},
   *     inverseJoinColumns={@ORM\JoinColumn(name="person_id", referencedColumnName="id")})
   * @Expose
   */
  protected $mainEvents;

  /**
   *
   * @ORM\OneToMany(targetEntity="SocialServiceAccount",  mappedBy="owner", cascade={"persist", "remove"})
   *
   */
  protected $accounts;

  /**
   * @ORM\Column(type="string", length=256, nullable=true)
   */
  protected $slug;

  /**
   * Constructor
   */
  public function __construct()
  {
    $this->papers = new ArrayCollection();
    $this->companies = new ArrayCollection();
    $this->roles = new ArrayCollection();
    $this->accounts = new ArrayCollection();
    $this->$mainEvents = new ArrayCollection();
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
   * onCreation
   *
   * @ORM\PrePersist()
   * @ORM\PreUpdate()
   */
  public function computeLabel()
  {
    $this->setLabel($this->firstName . " " . $this->familyName);
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
  public function getlabel()
  {
    return $this->label;
  }

  /**
   * Set familyName
   *
   * @param string $familyName
   *
   * @return $this
   */
  public function setFamilyName($familyName)
  {
    $this->familyName = $familyName;

    return $this;
  }

  /**
   * Get familyName
   *
   * @return string
   */
  public function getFamilyName()
  {
    return $this->familyName;
  }

  /**
   * Set firstName
   *
   * @param string $firstName
   *
   * @return $this
   */
  public function setFirstName($firstName)
  {
    $this->firstName = $firstName;

    return $this;
  }

  /**
   * Get firstName
   *
   * @return string
   */
  public function getFirstName()
  {
    return $this->firstName;
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
   * Set age
   *
   * @param integer $age
   *
   * @return $this
   */
  public function setAge($age)
  {
    $this->age = $age;

    return $this;
  }

  /**
   * Get age
   *
   * @return integer
   */
  public function getAge()
  {
    return $this->age;
  }

  /**
   * Set openId
   *
   * @param string $openId
   *
   * @return $this
   */
  public function setOpenId($openId)
  {
    $this->openId = $openId;

    return $this;
  }

  /**
   * Get openId
   *
   * @return string
   */
  public function getOpenId()
  {
    return $this->openId;
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
   * Add company
   *
   * @param Company $company
   *
   * @return $this
   */
  public function addCompany(Company $company)
  {
    $this->companies[] = $company;

    return $this;
  }

  /**
   * Remove company
   *
   * @param Company $company
   */
  public function removeCompany(Company $company)
  {
    $this->companies->removeElement($company);
  }

  /**
   * Get company
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getCompany()
  {
    return $this->companies;
  }

  /**
   * Add roles
   *
   * @param Role $roles
   *
   * @return $this
   */
  public function addRole(Role $roles)
  {
    $this->roles[] = $roles;

    return $this;
  }

  /**
   * Remove roles
   *
   * @param Role $roles
   */
  public function removeRole(Role $roles)
  {
    $this->roles->removeElement($roles);
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
   * Set mainEvents
   *
   * @param ArrayCollection $mainEvents
   * @return $this
   */
  public function setMainEvent(ArrayCollection $mainEvents)
  {
    $this->mainEvents = $mainEvents;

    return $this;
  }

  /**
   * Get mainEvents
   *
   * @return ArrayCollection
   */
  public function getMainEvents()
  {
    return $this->mainEvents;
  }

  /**
   * Add accounts
   *
   * @param SocialServiceAccount $accounts
   *
   * @return $this
   */
  public function addAccount(SocialServiceAccount $accounts)
  {
    $this->accounts[] = $accounts;

    return $this;
  }

  /**
   * Remove accounts
   *
   * @param SocialServiceAccount $accounts
   */
  public function removeAccount(SocialServiceAccount $accounts)
  {
    $this->accounts->removeElement($accounts);
  }

  /**
   * Get accounts
   *
   * @return \Doctrine\Common\Collections\Collection
   */
  public function getAccounts()
  {
    return $this->accounts;
  }

  /**
   * @return mixed
   */
  public function getUser()
  {
    return $this->user;
  }

  /**
   * @param UserInterface $user
   */
  public function setUser(UserInterface $user)
  {
    $this->user = $user;
  }
}
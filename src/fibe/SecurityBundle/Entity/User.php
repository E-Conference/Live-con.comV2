<?php

  namespace fibe\SecurityBundle\Entity;

  use Doctrine\Common\Collections\ArrayCollection;
  use fibe\Bundle\WWWConfBundle\Entity\Person;
  use FOS\UserBundle\Entity\User as BaseUser;
  use Doctrine\ORM\Mapping as ORM;

  use fibe\Bundle\WWWConfBundle\Entity\MainEvent;
  use FOS\UserBundle\Model\UserInterface;
  use JMS\Serializer\Annotation\Type;
  use JMS\Serializer\Annotation\ExclusionPolicy;
  use JMS\Serializer\Annotation\Expose;
  use JMS\Serializer\Annotation\Groups;
  use JMS\Serializer\Annotation\VirtualProperty;

  /**
   * @ORM\Entity(repositoryClass="fibe\SecurityBundle\Repository\UserRepository")
   * @ORM\Table(name="manager")  
   * @ExclusionPolicy("all") 
   */
  class User extends BaseUser
  {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     */
    protected $id;


    /**
     * @var string
     * @Type("string")
     * @Expose
     */
    protected $username;

    /**
     * @var string
     * @Type("string")
     * @Expose
     */
    protected $password;

    /**
     * Person
     *
     * @ORM\OneToOne(targetEntity="fibe\Bundle\WWWConfBundle\Entity\Person",cascade={"persist"})
     */
    private $person;


    /**
     *
     * @ORM\ManyToOne(targetEntity="fibe\Bundle\WWWConfBundle\Entity\MainEvent")
     * @ORM\JoinColumn(name="currentConf", referencedColumnName="id")
     */
    protected $currentConf;

    /**
     * @TODO : put it in person with a technical role
     *  
     * @ORM\ManyToMany(targetEntity="Team", inversedBy="confManagers", cascade={"persist","remove"})
     * @ORM\JoinTable(name="manager_team",
     *     joinColumns={@ORM\JoinColumn(name="manager_id", referencedColumnName="id", onDelete="Cascade")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="team_id", referencedColumnName="id", onDelete="Cascade")})
     */
    protected $teams;
 
 
    /** @ORM\Column(name="name", type="string", length=255, nullable=true) */
    protected $name;
 
    /** @ORM\Column(name="picture", type="string", length=255, nullable=true) */
    protected $picture;

    protected $captcha;




    /************************************
     * SOCIAL NETWORK ID
     * @TODO : put it in the table social_service_account
     ************************************/
 
    /** @ORM\Column(name="google_id", type="string", length=255, nullable=true) */
    protected $google_id;
 
    /** @ORM\Column(name="google_access_token", type="string", length=255, nullable=true) */
    protected $google_access_token;
 
    /** @ORM\Column(name="twitter_id", type="string", length=255, nullable=true) */
    protected $twitter_id;
 
    /** @ORM\Column(name="twitter_access_token", type="string", length=255, nullable=true) */
    protected $twitter_access_token;
 
    /** @ORM\Column(name="twitter_screen_name", type="string", length=255, nullable=true) */
    protected $twitter_screen_name;
 
    /** @ORM\Column(name="facebook_id", type="string", length=255, nullable=true) */
    protected $facebook_id;
 
    /** @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true) */
    protected $facebook_access_token;
 
    /** @ORM\Column(name="linkedin_id", type="string", length=255, nullable=true) */
    protected $linkedin_id;
 
    /** @ORM\Column(name="linkedin_access_token", type="string", length=255, nullable=true) */
    protected $linkedin_access_token;

    /**
     * Constructor
     */
    public function __construct()
    {
      parent::__construct();
      $this->teams = new ArrayCollection();
      $this->conferences = new ArrayCollection();
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
     * Add teams
     *
     * @param Team $teams
     *
     * @return User
     */
    public function addTeam(Team $teams)
    {
      $this->teams[] = $teams;

      return $this;
    }

    /**
     * Remove teams
     *
     * @param Team $teams
     */
    public function removeTeam(Team $teams)
    {
      $this->teams->removeElement($teams);
    }

    /**
     * Get teams
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTeams()
    {
      return $this->teams;
    } 
    

    /**
     * Add conferences
     *
     * @param MainEvent $conferences
     *
     * @return User
     */
    public function addConference(MainEvent $conferences)
    {
      $this->conferences[] = $conferences;

      return $this;
    }

    /**
     * Remove conferences
     *
     * @param MainEvent $conferences
     */
    public function removeConference(MainEvent $conferences)
    {
      $this->conferences->removeElement($conferences);
    }

    /**
     * Get conferences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConferences()
    {
      return $this->conferences;
    }

    /**
     * Set currentConf
     *
     * @param MainEvent $currentConf
     *
     * @return User
     */
    public function setCurrentConf(MainEvent $currentConf = null)
    {
      $this->currentConf = $currentConf;

      return $this;
    }

    /**
     * Get currentConf
     *
     * @return MainEvent
     */
    public function getCurrentConf()
    {
      return $this->currentConf;
    }

    public function getName()
    {
      return $this->name;
    }


    public function setName( $name )
    {
      $this->name = $name;

      return $this;
    }

    public function getPicture()
    {
      return $this->picture;
    }


    public function setPicture( $picture )
    {
      $this->picture = $picture;

      return $this;
    }

    /***************** SOCIAL NETWORK ID *******************/

    public function getGoogleId()
    {
      return $this->google_id;
    }

    public function setGoogleId( $googleId )
    {
      $this->google_id = $googleId;

      return $this;
    }

    public function getGoogleAccessToken()
    {
      return $this->google_access_token;
    }

    public function setGoogleAccessToken( $googleAccessToken )
    {
      $this->google_access_token = $googleAccessToken;

      return $this;
    }


    public function getTwitterId()
    {
      return $this->twitter_id;
    }

    public function setTwitterId( $twitterId )
    {
      $this->twitter_id = $twitterId;

      return $this;
    }

    public function getTwitterScreenName()
    {
      return $this->twitter_screen_name;
    }

    public function setTwitterScreenName( $twitterScreenName )
    {
      $this->twitter_screen_name = $twitterScreenName;

      return $this;
    }

    public function getTwitterAccessToken()
    {
      return $this->twitter_access_token;
    }

    public function setTwitterAccessToken( $twitterAccessToken )
    {
      $this->twitter_access_token = $twitterAccessToken;

      return $this;
    }


    public function getFacebookId()
    {
      return $this->facebook_id;
    }

    public function setFacebookId( $facebookId )
    {
      $this->facebook_id = $facebookId;

      return $this;
    }

    public function getFacebookAccessToken()
    {
      return $this->facebook_access_token;
    }

    public function setFacebookAccessToken( $facebookAccessToken )
    {
      $this->facebook_access_token = $facebookAccessToken;

      return $this;
    }


    public function getLinkedinId()
    {
      return $this->linkedin_id;
    }

    public function setLinkedinId( $linkedinId )
    {
      $this->linkedin_id = $linkedinId;

      return $this;
    }

    public function getLinkedinAccessToken()
    {
      return $this->linkedin_access_token;
    }

    public function setLinkedinAccessToken( $linkedinAccessToken )
    {
      $this->linkedin_access_token = $linkedinAccessToken;

      return $this;
    }

    /**
     * @return Person
     */
    public function getPerson()
    {
      return $this->person;
    }

    /**
     * @param Person $person
     */
    public function setPerson(Person $person)
    {
      $this->person = $person;
    }
  }
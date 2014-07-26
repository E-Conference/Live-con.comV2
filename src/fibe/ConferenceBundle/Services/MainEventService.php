<?php

  namespace fibe\ConferenceBundle\Services;

  use Doctrine\ORM\EntityManager;
  use fibe\Bundle\WWWConfBundle\Entity\Category;
  use fibe\Bundle\WWWConfBundle\Entity\Location;

  use fibe\ConferenceBundle\Entity\MainEvent;
  use fibe\Bundle\WWWConfBundle\Entity\Module;
  use fibe\MobileAppBundle\Entity\MobileAppConfig;
  use fibe\SecurityBundle\Entity\Team;
  use fibe\SecurityBundle\Entity\User;

  /**
   * Class MainEventService
   * @package fibe\Bundle\WWWConfBundle\Services
   */
  class MainEventService
  {

    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
      $this->entityManager = $entityManager;
    }



    public function create(User $user)
    {
      $mainEvent = new MainEvent();
      $mainEvent->setLogoPath("livecon.png");
      $mainEvent->setSummary("Livecon Conference");
      $mainEvent->setStartAt(new \DateTime('now'));
      $end = new \DateTime('now');
      $mainEvent->setEndAt($end->add(new \DateInterval('P2D')));
      $this->entityManager->persist($mainEvent);
      $this->entityManager->persist($mainEvent);


      //Module
      $defaultModule = new Module();
      $defaultModule->setPaperModule(1);
      $defaultModule->setOrganizationModule(1);
      $defaultModule->setSponsorModule(1);
      $defaultModule->setMainEvent($mainEvent);
      $this->entityManager->persist($defaultModule);

      //Create new App config for the conference
      $defaultAppConfig = new MobileAppConfig();

      //header color
      $defaultAppConfig->setBGColorHeader("#f2f2f2");
      $defaultAppConfig->setTitleColorHeader("#000000");
      //navBar color
      $defaultAppConfig->setBGColorNavBar("#305c6b");
      $defaultAppConfig->setTitleColorNavBar("#f3f6f6");
      //content color
      $defaultAppConfig->setBGColorContent("#f3f6f6");
      $defaultAppConfig->setTitleColorContent("#8c949c");
      //buttons color
      $defaultAppConfig->setBGColorButton("#f3f6f6");
      $defaultAppConfig->setTitleColorButton("#000000");
      //footer color
      $defaultAppConfig->setBGColorfooter("#305c6b");
      $defaultAppConfig->setTitleColorFooter("#f3f6f6");
      $defaultAppConfig->setIsPublished(true);
      $defaultAppConfig->setDblpDatasource(true);
      $defaultAppConfig->setGoogleDatasource(true);
      $defaultAppConfig->setDuckduckgoDatasource(true);
      $defaultAppConfig->setLang("EN");

      $this->entityManager->persist($defaultAppConfig);

      //Main conf event
      $mainEvent = new MainEvent();


      // conference location
      $mainEventLocation = new Location();
      $mainEventLocation->setLabel("Conference's location");
      $mainEventLocation->setMainEvent($mainEvent);
      $this->entityManager->persist($mainEventLocation);
      $mainEvent->setLocation($mainEventLocation);
      $this->entityManager->persist($mainEvent);

      //conference categories


      //categories

      //abstract category

      // $OrganisedEvent = new Category();
      // $OrganisedEvent->setName("OrganisedEvent")
      //          ->setColor("#0EFF74") ;
      // $this->entityManager->persist($OrganisedEvent);

      // $NonAcademicEvent = new Category();
      // $NonAcademicEvent->setName("NonAcademicEvent")
      //                 ->setColor("#A6FF88")
      //                 ->setParent($OrganisedEvent);
      // $this->entityManager->persist($NonAcademicEvent);

      // $AcademicEvent = new Category();
      // $AcademicEvent->setName("AcademicEvent")
      //               ->setColor("#57A5C9")
      //               ->setParent($OrganisedEvent);
      // $this->entityManager->persist($AcademicEvent);

      // non academic

      $SocialEvent = new Category();
      $SocialEvent->setMainEvent($mainEvent)
        ->setLabel("Social event")
        ->setColor("#B186D7")// ->setParent($NonAcademicEvent)
      ;
      $this->entityManager->persist($SocialEvent);

      $MealEvent = new Category();
      $MealEvent->setMainEvent($mainEvent)
        ->setLabel("Meal Event")
        ->setColor("#00a2e0")// ->setParent($NonAcademicEvent)
      ;
      $this->entityManager->persist($MealEvent);

      $BreakEvent = new Category();
      $BreakEvent->setMainEvent($mainEvent)
        ->setLabel("Break event")
        ->setColor("#00a2e0")// ->setParent($NonAcademicEvent)
      ;
      $this->entityManager->persist($BreakEvent);

      // academic

      $KeynoteEvent = new Category();
      $KeynoteEvent->setMainEvent($mainEvent)
        ->setLabel("Keynote event")
        ->setColor("#afcbe0")// ->setParent($AcademicEvent)
      ;
      $this->entityManager->persist($KeynoteEvent);

      $TrackEvent = new Category();
      $TrackEvent->setMainEvent($mainEvent)
        ->setLabel("Track event")
        ->setColor("#afcbe0")// ->setParent($AcademicEvent)
      ;
      $this->entityManager->persist($TrackEvent);

      $PanelEvent = new Category();
      $PanelEvent->setMainEvent($mainEvent)
        ->setLabel("Panel event")
        ->setColor("#e7431e")// ->setParent($AcademicEvent)
      ;
      $this->entityManager->persist($PanelEvent);

      $ConferenceEvent = new Category();
      $ConferenceEvent->setMainEvent($mainEvent)
        ->setLabel("Conference event")
        ->setColor("#b0ca0f")// ->setParent($AcademicEvent)
      ;
      $this->entityManager->persist($ConferenceEvent);

      $WorkshopEvent = new Category();
      $WorkshopEvent->setMainEvent($mainEvent)
        ->setLabel("Workshop event")
        ->setColor("#EBD94E")// ->setParent($AcademicEvent)
      ;
      $this->entityManager->persist($WorkshopEvent);

      $SessionEvent = new Category();
      $SessionEvent->setMainEvent($mainEvent)
        ->setLabel("Session event")
        ->setColor("#8F00FF")// ->setParent($AcademicEvent)
      ;
      $this->entityManager->persist($SessionEvent);

      $TalkEvent = new Category();
      $TalkEvent->setMainEvent($mainEvent)
        ->setLabel("Talk event")
        ->setColor("#FF5A45")// ->setParent($AcademicEvent)
      ;
      $this->entityManager->persist($TalkEvent);

      //Team
      $defaultTeam = new Team();
      $defaultTeam->addConfManager($user);
      $user->addTeam($defaultTeam);
      $defaultTeam->setConference($mainEvent);
      $mainEvent->setTeam($defaultTeam);
      $this->entityManager->persist($defaultTeam);

      //Linking app config to conference
      $mainEvent->setAppConfig($defaultAppConfig);
      $mainEvent->setModule($defaultModule);
//      $mainEvent->addCategory($ConferenceEvent);

      //Add conference to current manager
      $user->setCurrentMainEvent($mainEvent);
      $user->addConference($mainEvent);

      $this->entityManager->persist($user);
      $this->entityManager->persist($mainEvent);
      $this->entityManager->flush();

      //Create slug after persist => visibleon endpoint
      $mainEvent->slugify();
      $this->entityManager->persist($mainEvent);
      $this->entityManager->flush();
      return $mainEvent;
    }

    /**
     * empty the given main event and recreate basic datas
     *
     * @param MainEvent $mainEvent
     */
    public function reset(MainEvent $mainEvent)
    {
      $this->removeObjects($mainEvent);

      $mainEvent->setSummary("Livecon Conference");
      $mainEvent->setStartAt(new \DateTime('now'));
      $end = new \DateTime('now');
      $mainEvent->setEndAt($end->add(new \DateInterval('P2D')));
//      $mainEvent->addCategorie($this->entityManager->getRepository('fibeWWWConfBundle:Category')->findOneByName("ConferenceEvent"));

      //recreate main event location
      $mainEventLocation = new Location();
      $mainEventLocation->setLabel("Conference's location");
      $mainEvent->setLocation($mainEventLocation);
      $mainEventLocation->setMainEvent($mainEvent);
      $this->entityManager->persist($mainEventLocation);

      $this->entityManager->remove($mainEvent);
      $this->entityManager->flush();
    }

    /**
     * delete everything linked to a main but but the main event itself
     *
     * @param MainEvent $mainEvent
     */
    public function delete(MainEvent $mainEvent)
    {
      $this->removeObjects($mainEvent);

      // module
      $module = $mainEvent->getModule();
      $mainEvent->setModule(null);
      if($module)
      { 
        $this->entityManager->flush();
        $this->entityManager->remove($module);
        $this->entityManager->flush();
      }
 
      //appConfig
      $appConfig = $mainEvent->getAppConfig();
      $mainEvent->setAppConfig(null);
      if($appConfig)
      { 
        $this->entityManager->flush();
        $this->entityManager->remove($appConfig);
        $this->entityManager->flush();
      }

      //team
      $team = $mainEvent->getTeam();
      if($team)
      { 
        $mainEvent->setTeam(null);
        $this->entityManager->flush();
        $this->entityManager->remove($team);
        $this->entityManager->flush();
      }

      //Remove link between manager and conference
      $managers = $mainEvent->getConfManagers();
      foreach ($managers as $manager)
      {
        $mainEvent->removeConfManager($manager);
      }

      $this->entityManager->flush();
      $this->entityManager->remove($mainEvent);
      $this->entityManager->flush();
    }


    protected function removeObjects(MainEvent $mainEvent)
    {
      //  topics
      $topics = $mainEvent->getTopics();
      foreach ($topics as $topic)
      {
        $mainEvent->removeTopic($topic);
        $this->entityManager->remove($topic);
      }

      //  organizations
      $organizations = $mainEvent->getCompanies();
      foreach ($organizations as $organization)
      {
        $mainEvent->removeCompany($organization);
        $this->entityManager->remove($organization);
      }

      //  papers
      $papers = $mainEvent->getPapers();
      foreach ($papers as $paper)
      {
        $mainEvent->removePaper($paper);
        $this->entityManager->remove($paper);
      }

      //  locations
      $locations = $mainEvent->getLocations();
      foreach ($locations as $location)
      {
        $mainEvent->removeLocation($location);
        $this->entityManager->remove($location);
      }

      //  persons
      $persons = $mainEvent->getPersons();
      foreach ($persons as $person)
      {
        $mainEvent->removePerson($person);
        $this->entityManager->remove($person);
      }

      //  events
      $events = $mainEvent->getEvents();
      foreach ($events as $event)
      {
        $mainEvent->removeEvent($event);
        $this->entityManager->remove($event);
      }
    }

  }

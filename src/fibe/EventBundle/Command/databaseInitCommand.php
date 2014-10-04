<?php
  namespace fibe\EventBundle\Command;

  use fibe\ContentBundle\Entity\Equipment;
  use fibe\ContentBundle\Entity\RoleLabel;
  use fibe\EventBundle\Entity\Category;
  use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
  use Symfony\Component\Console\Input\InputInterface;
  use Symfony\Component\Console\Output\OutputInterface;

  /**
   * Initialization command for the DataBase
   *
   * Class databaseInitCommand
   * @package fibe\EventBundle\Command
   */
  class databaseInitCommand extends ContainerAwareCommand
  {

    protected function configure()
    {
      $this
        ->setName('livecon:database:init')
        ->setDescription('Insert data for conference managment');
    }

    /**
     * Executes the current command.
     *
     * This method is not abstract because you can use this class
     * as a concrete class. In this case, instead of defining the
     * execute() method, you set the code to execute by passing
     * a Closure to the setCode() method.
     *
     * @param InputInterface  $input  An InputInterface instance
     * @param OutputInterface $output An OutputInterface instance
     *
     * @return null|integer null or 0 if everything went fine, or an error code
     *
     * @throws \LogicException When this abstract method is not implemented
     * @see    setCode()
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {

      $em = $this->getContainer()->get('doctrine')->getManager('default');

      //RoleType
      $roleType = new RoleLabel();
      $roleType->setLabel("Delegate");
      $roleType->setLabel("Delegate");
      $em->persist($roleType);

      $roleType = new RoleLabel();
      $roleType->setLabel("Chair");
      $roleType->setLabel("Chair");
      $em->persist($roleType);

      $roleType = new RoleLabel();
      $roleType->setLabel("Presenter");
      $roleType->setLabel("Presenter");
      $em->persist($roleType);

      $roleType = new RoleLabel();
      $roleType->setLabel("ProgrammeCommitteeMember");
      $roleType->setLabel("Programme Committee Member");
      $em->persist($roleType);

      //Equipments
      $equipment = new Equipment();
      $equipment->setLabel("Computer")
        ->setIcon("laptop");
      $em->persist($equipment);

      $equipment = new Equipment();
      $equipment->setLabel("Speaker")
        ->setIcon("volume-up");
      $em->persist($equipment);

      $equipment = new Equipment();
      $equipment->setLabel("Wifi")
        ->setIcon("rss");
      $em->persist($equipment);

      $equipment = new Equipment();
      $equipment->setLabel("Screen")
        ->setIcon("film");
      $em->persist($equipment);

      $equipment = new Equipment();
      $equipment->setLabel("OHP")
        ->setIcon("video-camera");
      $em->persist($equipment);

      $equipment = new Equipment();
      $equipment->setLabel("Microphone")
        ->setIcon("microphone");
      $em->persist($equipment);

      //Topic
      /* $topic = new Topic();
       $topic->setName("Business");
       $em->persist($topic);

       $topic = new Topic();
       $topic->setName("Design");
       $em->persist($topic);

       $topic = new Topic();
       $topic->setName("Marketing");
       $em->persist($topic);

       $topic = new Topic();
       $topic->setName("Recherche");
       $em->persist($topic);

       $topic = new Topic();
       $topic->setName("Tech");
       $em->persist($topic);*/

       $OrganisedEvent = new Category();
      $OrganisedEvent->setLabel("Organized Event")
                     ->setColor("#0EFF74")
                     ->setLevel(3);
      $em->persist($OrganisedEvent);

      $NonAcademicEvent = new Category();
      $NonAcademicEvent->setLabel("Non Academic Event")
                       ->setColor("#A6FF88")
                       ->setLevel(3);
      $em->persist($NonAcademicEvent);

      $AcademicEvent = new Category();
      $AcademicEvent->setLabel("Academic Event")
                    ->setColor("#57A5C9")
                    ->setLevel(3);
      $em->persist($AcademicEvent);

      $SocialEvent = new Category();
      $SocialEvent->setLabel("Social Event")
                  ->setColor("#B186D7")
                  ->setLevel(3);
      $em->persist($SocialEvent);

      $MealEvent = new Category();
      $MealEvent->setLabel("Meal Event")
                ->setColor("#00a2e0")
                ->setLevel(3);
      $em->persist($MealEvent);

      $BreakEvent = new Category();
      $BreakEvent->setLabel("Break event")
                 ->setColor("#00a2e0")
                 ->setLevel(3);
      $em->persist($BreakEvent);

      $KeynoteEvent = new Category();
      $KeynoteEvent->setLabel("Keynote event")
                   ->setColor("#afcbe0")
                   ->setLevel(3);
      $em->persist($KeynoteEvent);

      $TrackEvent = new Category();
      $TrackEvent->setLabel("Track event")
                ->setColor("#afcbe0")
                ->setLevel(1);
      $em->persist($TrackEvent);

      $PanelEvent = new Category();
      $PanelEvent->setLabel("Panel Event")
                 ->setColor("#e7431e")
                 ->setLevel(3);
      $em->persist($PanelEvent);

      $ConferenceEvent = new Category();
      $ConferenceEvent->setLabel("Conference Event")
                      ->setColor("#b0ca0f")
                      ->setLevel(0);
      $em->persist($ConferenceEvent);

      $WorkshopEvent = new Category();
       $WorkshopEvent->setLabel("Workshop event")
                ->setColor("#EBD94E")
                ->setLevel(3);
      $em->persist($WorkshopEvent);

      $SessionEvent = new Category();
       $SessionEvent->setLabel("Session event")
                ->setColor("#8F00FF")
                ->setLevel(2);
      $em->persist($SessionEvent);

      $TalkEvent = new Category();
      $TalkEvent->setLabel("Talk event")
                ->setColor("#FF5A45")
                ->setLevel(0);
      $em->persist($TalkEvent);

      $em->flush();



      $em->flush();

      $output->writeln("rows inserted successfully");
    }
  }

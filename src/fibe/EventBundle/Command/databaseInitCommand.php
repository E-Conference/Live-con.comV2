<?php
  namespace fibe\EventBundle\Command;

  use fibe\ContentBundle\Entity\Equipment;
  use fibe\ContentBundle\Entity\RoleLabel;
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



      $em->flush();

      $output->writeln("rows inserted successfully");
    }
  }

<?php

  namespace fibe\CommunityBundle\Services;

  use Doctrine\ORM\EntityManager;
  use fibe\CommunityBundle\Entity\Person;
  use FOS\UserBundle\Mailer\MailerInterface;
  use FOS\UserBundle\Model\UserManagerInterface;
  use FOS\UserBundle\Util\TokenGeneratorInterface;

  /**
   * Class MainEventService
   * @package fibe\EventBundle\Services
   */
  class PersonService
  {

    protected $entityManager;
    protected $userManager;
    protected $tokenGenerator;
    protected $mailer;

    public function __construct(EntityManager $entityManager, UserManagerInterface $userManager, TokenGeneratorInterface $tokenGenerator, MailerInterface $mailer)
    {
      $this->entityManager = $entityManager;
      $this->userManager = $userManager;
      $this->tokenGenerator = $tokenGenerator;
      $this->mailer = $mailer;
    }

    /**
     * @param Person $person
     *
     * @throws \Doctrine\DBAL\DBALException when email or username is already in use
     */
    public function post(Person $person = null)
    {
      $email = $person->getEmail();
      $randomPwd = substr(base_convert(bin2hex(hash('sha256', uniqid(mt_rand(), true), true)), 16, 36), 0, 12);

      $newUser = $this->userManager->createUser();
      $newUser->setUsername($email);
      $newUser->setEmail($email);
      $newUser->setPlainPassword($randomPwd);
      $newUser->setEnabled(false);
      $newUser->setConfirmationToken($this->tokenGenerator->generateToken());
      $person->setUser($newUser);
      $this->userManager->updateUser($newUser);

      $this->mailer->sendConfirmationEmailMessage($newUser);
    }
  }

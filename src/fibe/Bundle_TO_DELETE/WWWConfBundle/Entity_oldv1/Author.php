<?php

namespace fibe\Bundle\WWWConfBundle\Entity_oldv1;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

use fibe\Bundle\WWWConfBundle\Entity_oldv1\Person;
use fibe\Bundle\WWWConfBundle\Entity_oldv1\Paper;


/**
 * This entity define relation between a paper and a person
 *
 *
 * @ORM\Table(name="author")
 * @ORM\Entity(repositoryClass="fibe\Bundle\WWWConfBundle\Repository\AuthorRepository")
 *
 */
class Author
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   *
   * @ORM\ManyToOne(targetEntity="Person", inversedBy="paper")
   *
   */
  private $person;

  /**
   *
   * @ORM\ManyToOne(targetEntity="Paper", inversedBy="author")
   */
  private $paper;

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
   * Set person
   *
   * @param \fibe\Bundle\WWWConfBundle\Entity_oldv1\Person $person
   *
   * @return Author
   */
  public function setPerson(\fibe\Bundle\WWWConfBundle\Entity_oldv1\Person $person = null)
  {
    $this->person = $person;

    return $this;
  }

  /**
   * Get person
   *
   * @return \fibe\Bundle\WWWConfBundle\Entity_oldv1\Person
   */
  public function getPerson()
  {
    return $this->person;
  }

  /**
   * Set paper
   *
   * @param \fibe\Bundle\WWWConfBundle\Entity_oldv1\Paper $paper
   *
   * @return Author
   */
  public function setPaper(\fibe\Bundle\WWWConfBundle\Entity_oldv1\Paper $paper = null)
  {
    $this->paper = $paper;

    return $this;
  }

  /**
   * Get paper
   *
   * @return \fibe\Bundle\WWWConfBundle\Entity_oldv1\Paper
   */
  public function getPaper()
  {
    return $this->paper;
  }
}
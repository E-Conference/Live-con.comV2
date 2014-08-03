<?php

namespace fibe\CommunityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This entity define relation between a paper and a person
 *
 *
 * @ORM\Table(name="additional_informations")
 * @ORM\Entity(repositoryClass="fibe\CommunityBundle\Repository\AdditionalInformationsRepository")
 *
 */
class AdditionalInformations
{
  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * Url of the website
   *
   * @ORM\Column(type="string", nullable=true)
   * @Expose
   */
  private $website;

  /**
   * @TODO Enum : I18N (CodeInfo/JS/...)
   *
   * country
   *
   * @ORM\Column(type="string", nullable=true)
   */
  private $country;

  /**
   * img
   *
   * @ORM\Column(type="string", nullable=true,  name="img")
   */
  private $img;

  /**
   * email
   *
   * @ORM\Column(type="string", nullable=true,  name="email")
   */
  private $email;

  public function __toString()
  {
    //@TODO : méthode to String fonctionnel
    return 'toString @TODO in AdditionalInformation Entity';
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
   * @return mixed
   */
  public function getWebsite()
  {
    return $this->website;
  }

  /**
   * @param mixed $website
   */
  public function setWebsite($website)
  {
    $this->website = $website;
  }

  /**
   * @return mixed
   */
  public function getCountry()
  {
    return $this->country;
  }

  /**
   * @param mixed $country
   */
  public function setCountry($country)
  {
    $this->country = $country;
  }

  /**
   * @return mixed
   */
  public function getImg()
  {
    return $this->img;
  }

  /**
   * @param mixed $img
   */
  public function setImg($img)
  {
    $this->img = $img;
  }

  /**
   * @return mixed
   */
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * @param mixed $email
   */
  public function setEmail($email)
  {
    $this->email = $email;
  }
}
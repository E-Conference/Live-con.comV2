<?php

namespace fibe\Bundle\WWWConfBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;
use Symfony\Component\Validator\Constraints as Assert;

use fibe\Bundle\WWWConfBundle\Util\StringTools;

class AddtionalInformations
{
  /**
   * Url of the website
   *
   * @ORM\Column(type="string", nullable=true)
   * @Expose
   */
  protected $website;

  /**
   * @TODO I18N : Grosse Enum/CodeInfo/JS/...
   *
   * country
   *
   * @ORM\Column(type="string", nullable=true)
   */
  protected $country;

  /**
   * img
   *
   * @ORM\Column(type="string", nullable=true,  name="img")
   */
  protected $img;

  /**
   * email
   *
   * @ORM\Column(type="string", nullable=true,  name="email")
   */
  protected $email;

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
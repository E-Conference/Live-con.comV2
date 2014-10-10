<?php

namespace fibe\CommunityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Discriminator;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * This entity complete informations on a person or on an organization as well
 *
 *
 * @ORM\Table(name="additional_informations")
 * @ORM\Entity(repositoryClass="fibe\CommunityBundle\Repository\AdditionalInformationsRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorMap({
 *     "Organization"="Organization",
 *     "OrganizationVersion"="OrganizationVersion",
 *     "Person"="Person"
 * })
 * @ExclusionPolicy("all")
 */
class AdditionalInformations
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * @Expose
     */
    protected $id;

    /**
     * label
     *
     * @ORM\Column(type="string")
     * @Expose
     */
    protected $label;

    /**
     * Url of the website
     *
     * @ORM\Column(type="string", nullable=true)
     * @Expose
     */
    protected $website;

    /**
     * @TODO Enum : I18N (CodeInfo/JS/...)
     *
     * country
     * @ORM\Column(type="string", nullable=true)
     * @Expose
     */
    protected $country;

    /**
     * img
     * @ORM\Column(type="string", nullable=true,  name="img")
     * @Expose
     */
    protected $img;

    /**
     * email
     * @ORM\Column(type="string", nullable=true,  name="email")
     * @Expose
     */
    protected $email;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Expose
     */
    private $description;

    /**
     * fix an issue with jms-serializer and form validation when applied to a doctrine InheritanceType("SINGLE_TABLE")
     */
    public $dtype;


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
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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
    public function setDescription($description)
    {
        $this->description = $description;
    }
}
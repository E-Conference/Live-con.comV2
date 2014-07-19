<?php

namespace Proxies\__CG__\fibe\Bundle\WWWConfBundle\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Location extends \fibe\Bundle\WWWConfBundle\Entity\Location implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'id', 'name', 'capacity', 'equipments', 'description', 'latitude', 'longitude', 'calendarEntities', '' . "\0" . 'fibe\\Bundle\\WWWConfBundle\\Entity\\Location' . "\0" . 'conference');
        }

        return array('__isInitialized__', 'id', 'name', 'capacity', 'equipments', 'description', 'latitude', 'longitude', 'calendarEntities', '' . "\0" . 'fibe\\Bundle\\WWWConfBundle\\Entity\\Location' . "\0" . 'conference');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Location $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', array());

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function getGeo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGeo', array());

        return parent::getGeo();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', array($name));

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', array());

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setCapacity($capacity)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCapacity', array($capacity));

        return parent::setCapacity($capacity);
    }

    /**
     * {@inheritDoc}
     */
    public function getCapacity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCapacity', array());

        return parent::getCapacity();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescription($description)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescription', array($description));

        return parent::setDescription($description);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescription', array());

        return parent::getDescription();
    }

    /**
     * {@inheritDoc}
     */
    public function setLatitude($latitude)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLatitude', array($latitude));

        return parent::setLatitude($latitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getLatitude()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLatitude', array());

        return parent::getLatitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setLongitude($longitude)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLongitude', array($longitude));

        return parent::setLongitude($longitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getLongitude()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLongitude', array());

        return parent::getLongitude();
    }

    /**
     * {@inheritDoc}
     */
    public function addLocationAwareCalendarEntitie(\fibe\Bundle\WWWConfBundle\Entity\LocationAwareCalendarEntity $locationAwareCalendarEntities)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addLocationAwareCalendarEntitie', array($locationAwareCalendarEntities));

        return parent::addLocationAwareCalendarEntitie($locationAwareCalendarEntities);
    }

    /**
     * {@inheritDoc}
     */
    public function removeLocationAwareCalendarEntitie(\fibe\Bundle\WWWConfBundle\Entity\LocationAwareCalendarEntity $locationAwareCalendarEntities)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeLocationAwareCalendarEntitie', array($locationAwareCalendarEntities));

        return parent::removeLocationAwareCalendarEntitie($locationAwareCalendarEntities);
    }

    /**
     * {@inheritDoc}
     */
    public function getLocationAwareCalendarEntities()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLocationAwareCalendarEntities', array());

        return parent::getLocationAwareCalendarEntities();
    }

    /**
     * {@inheritDoc}
     */
    public function addEquipment(\fibe\Bundle\WWWConfBundle\Entity\Equipment $equipments)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addEquipment', array($equipments));

        return parent::addEquipment($equipments);
    }

    /**
     * {@inheritDoc}
     */
    public function removeEquipment(\fibe\Bundle\WWWConfBundle\Entity\Equipment $equipments)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeEquipment', array($equipments));

        return parent::removeEquipment($equipments);
    }

    /**
     * {@inheritDoc}
     */
    public function getEquipments()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEquipments', array());

        return parent::getEquipments();
    }

    /**
     * {@inheritDoc}
     */
    public function setConference(\fibe\Bundle\WWWConfBundle\Entity\WwwConf $conference)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setConference', array($conference));

        return parent::setConference($conference);
    }

    /**
     * {@inheritDoc}
     */
    public function getConference()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getConference', array());

        return parent::getConference();
    }

}

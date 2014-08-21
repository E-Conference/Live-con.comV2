<?php

namespace fibe\RestBundle\Tests;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use fibe\ContentBundle\Entity\Location;


class LocationFixture extends AbstractFixture implements FixtureInterface
{
    static public $entities = array();

    public function load(ObjectManager $manager)
    {
        $entity = new Location();
        $entity->setLabel('title');

        $manager->persist($entity);
        $manager->flush();

        self::$entities[] = $entity;
    }
}

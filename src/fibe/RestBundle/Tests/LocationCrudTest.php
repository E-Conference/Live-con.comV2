<?php

namespace fibe\RestBundle\Tests\Controller;

use fibe\RestBundle\Tests\LocationFixture;
use Liip\FunctionalTestBundle\Test\WebTestCase as WebTestCase;

class LocationCrudTest extends WebTestCase
{

    const LOCATION_CLASS = 'fibe\RestBundle\Tests\LocationFixture';
    const API_URL = "/api/companies";

    private $client;

  function __construct()
  {
    // Create a new client to browse the application
    $this->client = static::createClient();
  }

    public function testGet()
    {
      $fixtures = array(static::LOCATION_CLASS);
      $this->loadFixtures($fixtures);
      $entities = LocationFixture::$entities;
      $entity = array_pop($entities);
      echo "entity id : ".($entity->getId());
      $route =  $this->getUrl("data_locations_get", array('id' => $entity->getId()));
      echo "route : ".$route;
      $this->client->request('GET', $route, array(),array(), array('HTTP_ACCEPT' => 'application/json'));
      $response = $this->client->getResponse();

      $this->assertJsonResponse($response);
      $content = $response->getContent();

      $decoded = json_decode($content, true);
      $this->assertTrue(isset($decoded['id']));
    }

    public function testHeadRoute()
    {
      $fixtures = array(static::LOCATION_CLASS);
      $this->loadFixtures($fixtures);
      $entities = LocationFixture::$entities;
        $entity = array_pop($entities);

        $this->client->request(
            'HEAD',  
            sprintf(static::API_URL.'/%d', $entity->getId()),
            array(),
            array(),
            array('HTTP_ACCEPT' => 'application/json')
        );
        $response = $this->client->getResponse();
        $this->assertJsonResponse($response, 200, false);
    }

  public function testPost()
  {
    $this->client->request(
      'POST',
      static::API_URL,
      array(),
      array(),
      array('HTTP_ACCEPT' => 'application/json',
        'CONTENT_TYPE' => 'application/json'),
      '{"label":"body1"}'
    );

    $this->assertJsonResponse($this->client->getResponse());
    $this->assertContains(
      'label":"body1',
      $this->client->getResponse()->getContent()
    );
  }

    public function testPostLocationActionShouldReturn400WithBadParameters()
    {
        $this->client->request(
            'POST',
            static::API_URL.'',
            array(),
            array(),
            array('HTTP_ACCEPT' => 'application/json',
              'CONTENT_TYPE' => 'application/json'),
            '{"labels":"body1"}'
        );

        $this->assertJsonResponse($this->client->getResponse(), 400, false);
    }

    public function testPutLocationActionShouldModify()
    {
        $fixtures = array(static::LOCATION_CLASS);
        $this->loadFixtures($fixtures);
        $entities = LocationFixture::$entities;
        $entity = array_pop($entities);
        $this->client->request(
            'GET', 
            sprintf(static::API_URL.'/%d',$entity->getId()),
            array(),
            array(),
            array('HTTP_ACCEPT' => 'application/json')
        );
        $this->assertEquals(
            200, 
            $this->client->getResponse()->getStatusCode(), 
            $this->client->getResponse()->getContent()
        );
        $this->client->request(
            'PUT',
            sprintf(static::API_URL.'/%d', $entity->getId()),
            array(),
            array(),
            array(
              'HTTP_ACCEPT' => 'application/json',
              'CONTENT_TYPE' => 'application/json'),
            '{"label":"abc"}'
        );
        $this->assertJsonResponse($this->client->getResponse());

        /* not implemented : responds 400 not found
        $this->assertTrue(
            $this->client->getResponse()->headers->contains(
                'Location',
                sprintf('http://localhost'.static::API_URL.'/%d', $entity->getId())
            ),
            $this->client->getResponse()->headers
        );*/
    }

    /*
    not implemented : responds 400 not found instead of create a new entity
    public function testPutLocationActionShouldCreate()
    {
        $id = 0;
        $this->client->request('GET',
          sprintf(static::API_URL.'/%d', $id),
          array(),
          array(),
          array('HTTP_ACCEPT' => 'application/json')
        );

        $this->assertEquals(
            404, 
            $this->client->getResponse()->getStatusCode(), 
            $this->client->getResponse()->getContent()
        );

        $this->client->request(
            'PUT',
            sprintf(static::API_URL.'/%d', $id),
            array(),
            array(),
            array('HTTP_ACCEPT' => 'application/json',
              'CONTENT_TYPE' => 'application/json'),
          '{"label":"abc"}'
        );

        $this->assertJsonResponse($this->client->getResponse(), 201, false);
    }*/

/* @TODO : change by an entity with two text field so we can perform this test
    public function testPatch()
    {
      $fixtures = array(static::LOCATION_CLASS);
      $this->loadFixtures($fixtures);
      $entities = LocationFixture::$entities;
        $entity = array_pop($entities);

        $this->client->request(
            'PATCH',
            sprintf(static::API_URL.'/%d', $entity->getId()),
            array(),
            array(),
            array('HTTP_ACCEPT' => 'application/json',
              'CONTENT_TYPE' => 'application/json'),
            '{"body":"def"}'
        );

        $this->assertJsonResponse($this->client->getResponse(), 204, false);
        $this->assertTrue(
            $this->client->getResponse()->headers->contains(
                'Location',
                sprintf('http://localhosstatic::API_URL.t/%d', $entity->getId())
            ),
            $this->client->getResponse()->headers
        );
    }*/

    protected function assertJsonResponse(
        $response, 
        $statusCode = 200, 
        $checkValidJson =  true, 
        $contentType = 'application/json'
    )
    {
        $this->assertEquals(
            $statusCode,
            $response->getStatusCode(),
            $response
        );
        $this->assertTrue(
            $response->headers->contains('Content-Type', $contentType),
            $response->headers,
            $response->headers
        );

        if ($checkValidJson) {
            $decode = json_decode($response->getContent());
            $this->assertTrue(($decode != null && $decode != false),
                'is response valid json: [' . $response->getContent() . ']',
                $response->getContent()
            );
        }
    }
}

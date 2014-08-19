<?php

namespace fibe\SecurityBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;

class LoginTest extends WebTestCase
{
  private $client;


  function __construct()
  {
    // Create a new client to browse the application
    $this->client = static::createClient();
  }

  public function doLogin($username, $password) {
    $crawler = $this->client->request('GET', '/login');
    $form = $crawler->selectButton('submitButton')->form(array(
      '_username'  => $username,
      '_password'  => $password,
    ));
    return $this->client->submit($form);
  }

  public function testLogin()
  {
    $crawler = $this->client->request('GET', '/user/');
    $this->assertTrue($this->client->getResponse()->isRedirect());
    $crawler = $this->doLogin("admin", "wrongpwd");
    $this->assertTrue(strpos($this->client->getResponse()->getContent(),"error") !== false);
    $this->doLogin("admin", "admin");
    $this->assertJsonResponse($this->client->getResponse(), 200);
  }


  public function testGoogleOAuthRedirection()
  {
    $crawler = $this->client->request('GET', '/connect/google');
    $this->assertTrue($this->client->getResponse()->isRedirect());
    $this->assertTrue(
      'https://accounts.google.com/o/oauth2/auth?response_type=code&client_id=381296840409-ajut55prn2ahl0n8hakpufia7pbc5ovd.apps.googleusercontent.com&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile&redirect_uri=http%3A%2F%2Flocalhost%2Flogin%2Fcheck-google'
      == $this->client->getResponse()->headers->get('location')
    );

  }

//  public function testCompleteScenario()
//  {
//    // Create a new client to browse the application
//    $this->doLogin("admin","admin");
//    // Create a new entry in the database
//    $crawler = $this->client->request('GET', '/user/');
//    $this->assertEquals(200, $this->client->getResponse()->getStatusCode(), "Unexpected HTTP status code for GET /user/");
//    $crawler = $this->client->click($crawler->selectLink('Create a new entry')->link());
//
//    // Fill in the form and submit it
//    $form = $crawler->selectButton('Create')->form(array(
//        'fibe_securitybundle_usertype[field_name]'  => 'Test',
//        // ... other fields to fill
//    ));
//
//    $this->client->submit($form);
//    $crawler = $this->client->followRedirect();
//
//    // Check data in the show view
//    $this->assertGreaterThan(0, $crawler->filter('td:contains("Test")')->count(), 'Missing element td:contains("Test")');
//
//    // Edit the entity
//    $crawler = $this->client->click($crawler->selectLink('Edit')->link());
//
//    $form = $crawler->selectButton('Edit')->form(array(
//        'fibe_securitybundle_usertype[field_name]'  => 'Foo',
//        // ... other fields to fill
//    ));
//
//    $this->client->submit($form);
//    $crawler = $this->client->followRedirect();
//
//    // Check the element contains an attribute with value equals "Foo"
//    $this->assertGreaterThan(0, $crawler->filter('[value="Foo"]')->count(), 'Missing element [value="Foo"]');
//
//    // Delete the entity
//    $this->client->submit($crawler->selectButton('Delete')->form());
//    $crawler = $this->client->followRedirect();
//
//    // Check the entity has been delete on the list
//    $this->assertNotRegExp('/Foo/', $this->client->getResponse()->getContent());
//  }

  protected function assertJsonResponse($response, $statusCode = 200, $checkValidJson =  true)
  {
    $this->assertEquals(
      $statusCode, $response->getStatusCode(),
      $response->getContent()
    );
    $this->assertTrue(
      $response->headers->contains('Content-Type', 'application/json'),
      $response->headers
    );

    if ($checkValidJson) {
      $decode = json_decode($response->getContent());
      $this->assertTrue(($decode != null && $decode != false),
        $response->getContent()
      );
    }

  }
}
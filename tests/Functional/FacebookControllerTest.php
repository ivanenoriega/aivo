<?php

namespace Tests\Functional;

class FacebookControllerTest extends BaseTestCase
{
    public function testGetUserProfileSucessully()
    {
        $response = $this->runApp('GET', '/profile/facebook/100006276904983');
        
        // Check the status code
        $this->assertEquals(200, $response->getStatusCode());

    }

    public function testGetUserProfileNotFound()
    {
        $response = $this->runApp('GET', '/profile/facebook/123123213123213213');

        // Check the status code
        $this->assertEquals(400, $response->getStatusCode());

        // Check the error message
        $data = json_decode($response->getBody(), true);
        $this->assertEquals("Graph returned an error: (#803) Some of the aliases you" . 
            " requested do not exist: 123123213123213213", $data['errors'][0]);
    }

    public function testGetUserProfileIncomplete()
    {
        $response = $this->runApp('GET', '/profile/facebook');

        // Check the status code
        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testGetUserProfileIncorrect()
    {
        $response = $this->runApp('GET', '/profile/facebook/aaaaaaaaaaaaaaaaaa');

        // Check the status code
        $this->assertEquals(400, $response->getStatusCode());

        // Check the error message
        $data = json_decode($response->getBody(), true);
        $this->assertEquals("Facebook user's Id should be a number", $data['errors'][0]);
    }
}
<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserActionsTest extends WebTestCase
{

    use \App\Tests\JwtLogin;

    private $token;
    private $client;

    public function setUp(): void
    {
        $this->client = $this->createAuthenticatedClient();
    }

    public function testListUserActionLogin(): void
    {
        $this->client->request('GET', '/api/users');

        $this->assertResponseIsSuccessful();
    }

    public function testStoreUserAction()
    {
        $this->client->request('POST',
            '/api/users',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'name'     => 'Davi',
                'email'    => 'daviuchoa@test.com',
                'password' => '84752#99#$%94#87&59'
            ])
        );

        $this->assertEquals(201, $this->client->getResponse()->getStatusCode());
    }

}

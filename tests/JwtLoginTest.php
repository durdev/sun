<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JwtLoginTest extends WebTestCase
{

    use \App\Tests\JwtLogin;

    private $client;

    public function setUp(): void
    {
        $this->client = $this->createAuthenticatedClient();
    }

    public function testAuthenticatedAction()
    {
        $token = $this->client->getContainer()
            ->get('lexik_jwt_authentication.encoder')
            ->encode([
                'username' => 'teste@teste.com',
                'password' => 'testet'
            ]);

        $this->client->request('GET', '/api/users', [], [], ['HTTP_AUTHORIZATION' => "Bearer {$token}"]);

        $this->assertResponseIsSuccessful();
    }

}

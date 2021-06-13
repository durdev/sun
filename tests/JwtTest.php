<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JwtTest extends WebTestCase
{

    private $client;

    public function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testUnauthenticatedAction()
    {
        $this->client->request('GET', '/api/users');

        $this->assertResponseStatusCodeSame(401);
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

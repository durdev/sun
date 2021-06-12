<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class JwtTest extends WebTestCase
{

    public function testUnauthenticatedAction()
    {
        $client = static::createClient();
        $client->request('GET', '/api/users');
        $this->assertResponseStatusCodeSame(401);

        $token = $client->getContainer()
            ->get('lexik_jwt_authentication.encoder')
            ->encode([
                'username' => 'teste@teste.com',
                'password' => 'testet'
            ]);

        $client->request('GET', '/api/users', [], [], ['HTTP_AUTHORIZATION' => "Bearer {$token}"]);

        $this->assertResponseIsSuccessful();
    }

}

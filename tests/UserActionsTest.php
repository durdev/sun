<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserActionsTest extends WebTestCase
{

    private $token;
    private $client;

    public function setUp(): void
    {
        $this->client = static::createClient();
        $this->token  = $this->client
            ->getContainer()
            ->get('lexik_jwt_authentication.encoder')
            ->encode([
                'username' => 'teste@teste.com',
                'password' => 'testet'
            ]);
    }

    public function testListUserActionLogin(): void
    {
        $this->client->request('GET', '/api/users', [], [], ['HTTP_AUTHORIZATION' => "Bearer {$this->token}"]);

        $this->assertResponseIsSuccessful();
    }

    // public function testStoreUserAction()
    // {
    //     # code...
    // }

    // public function testUpdateUserAction()
    // {
    //     # code...
    // }

    // public function testDeleteUserAction()
    // {
    //     # code...
    // }
}

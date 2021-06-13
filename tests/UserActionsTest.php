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
        $this->client->request('GET', '/api/users', [], []);

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

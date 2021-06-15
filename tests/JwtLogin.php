<?php

namespace App\Tests;

trait JwtLogin {

    protected function createAuthenticatedClient($username = 'test.user@sun.com', $password = 'test_sun')
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/login_user',
            [],
            [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                'username' => $username,
                'password' => $password,
            ])
        );

        $data = json_decode($client->getResponse()->getContent(), true);
        $client->setServerParameter('HTTP_Authorization', sprintf('Bearer %s', $data['token']));

        return $client;
    }

}

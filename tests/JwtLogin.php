<?php

namespace App\Tests;

trait JwtLogin {

    protected function createAuthenticatedClient($username = 'user', $password = 'password')
    {
        $client = static::createClient();
        $token  = $client
            ->getContainer()
            ->get('lexik_jwt_authentication.encoder')
            ->encode([
                'username' => 'teste@teste.com',
                'password' => 'testet'
            ]);

        // $client->request(
        //     'POST',
        //     '/api/login_user',
        //     [],
        //     [],
        //     ['CONTENT_TYPE' => 'application/json'],
        //     json_encode([
        //         'username' => $username,
        //         'password' => $password,
        //     ])
        // );

        // $data = json_decode($client->getResponse()->getContent(), true);
        $client->setServerParameter('HTTP_Authorization', sprintf('Bearer %s', $token));

        return $client;
    }

}

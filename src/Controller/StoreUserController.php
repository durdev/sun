<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users", name="users.store", methods={"POST"})
 */
class StoreUserController extends AbstractController
{

    public function __invoke(Request $request): Response
    {
        dump($request->toArray());die;

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/StoreUserController.php',
        ]);
    }

}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UpdateUserController extends AbstractController
{
    /**
     * @Route("/users/{user}", name="users.update", methods={"PUT"})
     */
    public function __invoke(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UpdateUserController.php',
        ]);
    }
}

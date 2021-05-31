<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users", name="users.delete", methods={"DELETE"})
 */
class DeleteUserController extends AbstractController
{

    public function __invoke(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DeleteUserController.php',
        ]);
    }
}

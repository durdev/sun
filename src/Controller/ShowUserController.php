<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users/{user}", name="users.show", methods={"GET"})
 */
class ShowUserController extends AbstractController
{

    public function __invoke(User $user): Response
    {
        return $this->json(['data' => $user]);
    }

}

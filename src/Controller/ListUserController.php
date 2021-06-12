<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/users", name="users.index", methods={"GET"})
 */
class ListUserController extends AbstractController
{

    public function __invoke(UserRepository $userRepository): Response
    {
        $data = array_map(function ($user) {
            return $user->toArray();
        }, $userRepository->findAll());

        return $this->json(compact('data'));
    }

}

<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\HttpUtils;

/**
 * @Route("/users/{user}", name="users.delete", methods={"DELETE"})
 */
class DeleteUserController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function __invoke(User $user): Response
    {
        $this->entityManager->remove($user);
        $this->entityManager->flush();

        return $this->json(['data' => 'User removed'], Response::HTTP_NO_CONTENT);
    }

}

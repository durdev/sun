<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UpdateUserController extends AbstractController
{

    public function __construct(UserPasswordEncoderInterface $passwordEncoder,
        ValidatorInterface $validator,
        EntityManagerInterface $entityManager
    ) {
        $this->passwordEncoder = $passwordEncoder;
        $this->validator = $validator;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/users/{user}", name="users.update", methods={"PUT"})
     */
    public function __invoke(User $user, Request $request): Response
    {
        $userData = $request->toArray();

        $user->setName($userData['name']);
        $user->setEmail($userData['email']);

        if (isset($userData['email'])) {
            $user->setPassword(
                $this->passwordEncoder->encodePassword($user, $userData['password'])
            );
        }

        $errors = $this->validator->validate($user);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;

            return new Response($errorsString);
        }

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $this->json([
            'data' => $user
        ], Response::HTTP_OK);
    }
}

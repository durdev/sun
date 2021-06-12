<?php

namespace App\DTO;

use App\Entity\User;

class DefaultUserDTO
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->user->getId(),
            'email' => $this->user->getEmail(),
            'roles' => $this->user->getRoles(),
            'name' => $this->user->getName(),
        ];
    }

    public function toJson(): string
    {
        return json_encode([
            'id' => $this->user->getId(),
            'email' => $this->user->getEmail(),
            'roles' => $this->user->getRoles(),
            'name' => $this->user->getName(),
        ]);
    }

}

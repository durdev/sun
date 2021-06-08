<?php

namespace App\DTO;

use App\Entity\User;

class DefaultUserDTO
{

    public $id;
    public $email;
    public $roles = [];
    public $password;
    public $name;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'roles' => $this->roles,
            'name' => $this->name,
        ];
    }

}

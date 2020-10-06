<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder
{
    protected array $properties = [
        'username',
        'password'
    ];

    public function setUsername(?string $user)
    {
        $this->data['username'] = $user;
    }

    public function getUsername()
    {
        return $this->data['username'] ?? null;
    }

    public function setPassword(?string $password)
    {
        $this->data['password'] = $password;
    }

    public function getPassword()
    {
        return $this->data['password'] ?? null;
    }
}
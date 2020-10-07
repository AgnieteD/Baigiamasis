<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder
{
    protected array $properties = [
        'username',
        'lastname',
        'email',
        'password',
        'phone',
        'address'
    ];

    public function setUsername(?string $username)
    {
        $this->data['username'] = $username;
    }

    public function getUsername()
    {
        return $this->data['username'] ?? null;
    }

    public function setLastname(?string $lastname)
    {
        $this->data['lastname'] = $lastname;
    }

    public function getLastname()
    {
        return $this->data['lastname'] ?? null;
    }

    public function setEmail(?string $email)
    {
        $this->data['email'] = $email;
    }

    public function getEmail()
    {
        return $this->data['email'] ?? null;
    }

    public function setPassword(?string $password)
    {
        $this->data['password'] = $password;
    }

    public function getPassword()
    {
        return $this->data['password'] ?? null;
    }

    public function setPhone($phone)
    {
        $this->data['phone'] = $phone;
    }

    public function getPhone()
    {
        return $this->data['phone'] ?? null;
    }

    public function setAddress(?string $address)
    {
        $this->data['address'] = $address;
    }

    public function getAddress()
    {
        return $this->data['address'] ?? null;
    }
}
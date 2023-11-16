<?php

namespace VNCHub\Mvc\Entity;

class User
{
    private ?int $id = null;
    private ?string $password = null;
    
    public function __construct(
        readonly string $name, 
        readonly string $email, 
        ) {}

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }
}
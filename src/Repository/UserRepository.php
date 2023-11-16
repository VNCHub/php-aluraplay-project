<?php

namespace VNCHub\Mvc\Repository;
use VNCHub\Mvc\Entity\User;

class UserRepository
{
    public function __construct(
        private \PDO $pdo
    ) {}

    public function findByEmail(string $email): ?User
    {
        $sqlSelect = "SELECT * FROM users WHERE email = :email";
        $query = $this->pdo->prepare($sqlSelect);
        $query->bindValue(":email", $email);
        $query->execute();
        $userData = $query->fetch(\PDO::FETCH_ASSOC);
        if($userData != false) {
            $user = new User(
                name: $userData['name'],
                email: $userData['email'],
            );
            $user->setPassword($userData['password']);
        } else {
            $user = null;
        }
        return $user;
    }

    public function rehashPassword(User $user): bool 
    {
        $stmt = $this->pdo->prepare('UPDATE users SET password = ? WHERE id = ?;');
        $stmt->bindValue('1', $user->getPassword());
        $stmt->bindValue('2', $user->getid());
        return $stmt->execute();
    }
}
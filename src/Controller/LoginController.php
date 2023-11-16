<?php

namespace VNCHub\Mvc\Controller;
use VNCHub\Mvc\Controller\Controller;
use VNCHub\Mvc\Repository\UserRepository;

class LoginController implements Controller
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {        
        $this->pdo = $pdo;
    }
    
    public function processaRequisicao(): void
    {
        $userRepository = new UserRepository($this->pdo);
        $email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST,"senha");

        if(empty($email) || empty($password)) {
            header("Location: /login?sucesso=0");
            exit();
        }

        $user = $userRepository->findByEmail($email);

        if ($user == null) {
            header("Location: /login?sucesso=0");
            exit();
        }

        $autentication = password_verify($password, $user->getPassword() ?? '');

        if($autentication) {
            $_SESSION['logado'] = $autentication;
            if (password_needs_rehash($user->getPassword(), PASSWORD_ARGON2ID)) {
                $user->setPassword = password_hash($user->getPassword(), PASSWORD_ARGON2ID);
                $userRepository->rehashPassword($user);
            }
            
            header("Location: /");
            exit();
        }
        header("Location: /login?sucesso=0");
    }
}
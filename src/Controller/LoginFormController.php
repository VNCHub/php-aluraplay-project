<?php

namespace VNCHub\Mvc\Controller;
use VNCHub\Mvc\Controller\Controller;

class LoginFormController implements Controller
{
    public function __construct(
        private \PDO $pdo
        ){}
    
        public function processaRequisicao(): void
    {
        if($_SESSION["logado"] === true) {
            header("Location: /");
            return;
        }
        require_once __DIR__ ."/../../views/__loginForm.php";
    }
}
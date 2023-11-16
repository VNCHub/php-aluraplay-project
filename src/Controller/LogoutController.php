<?php

namespace VNCHub\Mvc\Controller;

use VNCHub\Mvc\Controller\Controller;

class LogoutController implements Controller 
{

    public function processaRequisicao() : void
    {
        unset($_SESSION['logado']);
        header("Location: /login");
    }
}
<?php

namespace VNCHub\Mvc\Controllers;
use VNCHub\Mvc\Controller\Controller;

class Code404Controller implements Controller
{
    public function processaRequisicao(): void
    {
        http_response_code(404);
    }
}
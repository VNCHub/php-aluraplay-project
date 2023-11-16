<?php

session_start();
session_regenerate_id(true);
$path = $_SERVER['PATH_INFO'] ?? '/';
$isLoginPath = ($path === '/login');

if(!array_key_exists("logado", $_SESSION) && !$isLoginPath){
    header("Location: /login");
}

require_once __DIR__ . "/../vendor/autoload.php";

$routes = require_once __DIR__ ."/../config/routes.php";

$method = $_SERVER['REQUEST_METHOD'];
$pdo = new \PDO("sqlite:" . __DIR__ . '/../banco.sqLite');
$controllerClass = $routes["$method|$path"];

$controller = new $controllerClass($pdo);
$controller->processaRequisicao();
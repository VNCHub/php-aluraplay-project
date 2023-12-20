<?php

use VNCHub\Mvc\Entity\User;
use VNCHub\Mvc\Repository\UserRepository;

require_once __DIR__ . "/vendor/autoload.php";

$dbPath = __DIR__ . '/banco.sqLite';

if (!file_exists($dbPath)){
    $pdo = new PDO("sqlite:$dbPath");
    $userRepository = new UserRepository($pdo);
    criarBanco($pdo);
    $user = recebeUsuario($argv);
    $userRepository->saveAdminUser($user);

} else {
    if(array_key_exists(1, $argv)) {
        $answer = readline("Já existe um banco de dados com usuário admin, deseja apagar o banco e criar um novo? (s/n): ");
        if ($answer === 's') {
            exec('rm banco.sqLite');
            $pdo = new PDO("sqlite:$dbPath");
            $userRepository = new UserRepository($pdo);
            criarBanco($pdo);
            $user = recebeUsuario($argv);
            $userRepository->saveAdminUser($user);
        } else {
            echo "Será considerado login administrativo já cadastrado." . PHP_EOL;
        }
    }
}

exec("php -S localhost:8000 -t public/");

function recebeUsuario(?array $argv): User {
    
    if(array_key_exists(1, $argv)) {
        $name = $argv[1];
    } else {
        $name = readline("Digite um nome para o usuário admin: ");
    }
    
    if(array_key_exists(2, $argv)) {
        $email = $argv[2];
    } else {
        $email = readline("Digite um email para o usuário admin: ");
    }
    if(array_key_exists(3, $argv)) {
        $password = $argv[3];
    } else {
        $password = readline("Digite uma senha para o usuário admin: ");
    }
    
    $user = new User($name, $email);
    $user->setPassword($password);
    return $user;
}

function criarBanco($pdo) {
    $pdo->exec('CREATE TABLE videos(
        id INTEGER PRIMARY KEY, url TEXT, title TEXT, image_path TEXT
        );');
    $pdo->exec('CREATE TABLE users(
        id INTEGER PRIMARY KEY, name TEXT, email TEXT, password TEXT
        );');
}
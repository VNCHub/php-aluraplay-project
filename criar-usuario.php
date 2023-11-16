<?php

$dbPath = __DIR__ . '/banco.sqLite';
$pdo = new PDO("sqlite:$dbPath");

$name = $argv[1];
$email = $argv[2];
$password = $argv[3];
$hash = password_hash($password, PASSWORD_ARGON2ID);

$sqlInsert = 'INSERT INTO users(name, email, password) VALUES (?,?,?);';
$stmt = $pdo->prepare($sqlInsert);
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $email);
$stmt->bindParam(3, $hash);
$stmt->execute();
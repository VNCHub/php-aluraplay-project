<?php 

$dbPath = __DIR__ . '/banco.sqLite';
$pdo = new PDO("sqlite:$dbPath");
$pdo->exec('CREATE TABLE IF NOT EXISTS videos(
    id INTEGER PRIMARY KEY, url TEXT, title TEXT
    );');
$pdo->exec('CREATE TABLE IF NOT EXISTS users(
    id INTEGER PRIMARY KEY, name TEXT, email TEXT, password TEXT
    );');
?>
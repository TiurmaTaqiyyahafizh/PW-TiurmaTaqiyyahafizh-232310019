<?php
// config/database.php

$host = 'localhost';
$db   = 'pembelajaran_6_db'; // Ganti dengan nama database yang Anda inginkan
$user = 'root';              // Ganti dengan username database Anda
$pass = '';                  // Ganti dengan password database Anda
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

return $pdo; // Mengembalikan objek PDO connection
<?php
declare(strict_types=1);

require_once __DIR__ . '/settings.php';
date_default_timezone_set(APP_TIMEZONE);

$host = '127.0.0.1';
$port = 3308;
$dbname = 'spotly';
$username = 'root';
$password = '';

$dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
    $pdo->exec("SET time_zone = '+08:00'");
} catch (PDOException $exception) {
    http_response_code(500);
    exit('Database connection failed: ' . $exception->getMessage());
}
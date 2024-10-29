<?php
require 'vendor/autoload.php'; // Asegúrate de que la ruta sea correcta

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Luego intenta acceder a las variables
try {
    $dsn = "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_DATABASE'];
    $pdo = new PDO($dsn, $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa a la base de datos!";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

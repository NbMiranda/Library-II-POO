<?php 
//conection database PDO
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

function connect(){
    $localServer = $_ENV['DB_HOST'];
    $userServer = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];
    $database = $_ENV['DB_DATABASE'];

    $conn = new PDO("mysql:host=$localServer;dbname=$database", $userServer, $password);
    
    return $conn;
}

?>
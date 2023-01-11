<?php 
//conection database PDO
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('HOST', $_ENV['DB_HOST']);
define('USER', $_ENV['DB_USER']);
define('PASSWORD', $_ENV['DB_PASSWORD']);
define('DATABASE', $_ENV['DB_DATABASE']);

class Connect{
    public static $connection;

    public static function getConnection(){
        if (!isset(self::$connection)) {
            self::$connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$connection->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$connection;
    }
}

?>
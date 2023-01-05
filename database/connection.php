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
    private $query;
    protected $connection;
    protected $page;

    function __construct(){
        $this->connectDatabase();
    }

    function connectDatabase(){
        try {
            $this->connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
        } catch (PDOException $e) {
            echo "Erro na Conexão com banco de dados". $e->getMessage();
            die();
        }
    }
    public function execute($sql){
        $conn = $this->connection;
        $sql = $conn->prepare($sql);
        $sql->execute();
    }

    public function setPagination($query){
        $conn = $this->connection;
        $this->page = $conn->query($query)->fetchColumn();
    }
    public function getPagination(){
        return $this->page;
    }
    
    public function setQuery($query){
        $conn = $this->connection;
        $sql = $conn->prepare($query);
        $sql->execute(array());
        $this->query = $sql->fetchAll();
    }
    public function getQuery(){
        return $this->query;
    }
}

?>
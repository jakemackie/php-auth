<?php

require_once("..\\..\\..\\..\\vendor\\autoload.php");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT'] . "/php_auth");
$dotenv->load();

class Database
{
    private $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $host = $_ENV['DB_HOST'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];
        $database = $_ENV['DB_NAME'];
        $port = $_ENV['DB_PORT'];

        $this->connection = new mysqli($host, $username, $password, $database, $port);

        if ($this->connection) {
            echo ("Connected to the database.");
        }

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
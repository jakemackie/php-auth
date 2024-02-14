<?php

require_once("..\\..\\vendor\\autoload.php");

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

    /**
     * Establishes a connection to the database using environment variables.
     *
     * @throws \Exception When any required environment variable is missing.
     * @throws \Exception When the database connection fails.
     */

    private function connect()
    {
        $host = $_ENV['DB_HOST'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];
        $database = $_ENV['DB_NAME'];
        $port = $_ENV['DB_PORT'];

        $this->connection = new mysqli($host, $username, $password, $database, $port);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        $this->connection->close();
    }

    /**
     * Creates a new user in the database.
     *
     * @param mysqli $connection The database connection.
     */

    public function createUser($fname, $lname, $email, $username, $password)
    {
        $stmt = $this->connection->prepare("INSERT INTO users (fname, lname, email, username, password_hash) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fname, $lname, $email, $username, $password);
        $stmt->execute();
        $stmt->close();
    }

    /**
     * Queries the database for a user with the given ID.
     *
     * @param int $id The user's ID.
     */
    public function getUserById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    /**
     * Queries the database for a user with the given username.
     *
     * @param int $username The user's username.
     */
    public function getUserByUsername($username)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    /**
     * Queries the database for a user with the given email.
     *
     * @param int $email The user's email.
     */

    public function getUserByEmail($email)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    /**
     * Queries the database for a user with the given email or username.
     *
     * @param string $usernameOrEmail The user's username or email.
     */
    public function getUserByEmailOrUsername($emailOrUsername)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
        $stmt->bind_param("ss", $emailOrUsername, $emailOrUsername);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }
}
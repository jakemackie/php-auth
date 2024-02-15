<?php

require("..\\model\\Database.model.php");

$database = new Database();
$connection = $database->getConnection();

session_start();

if (isset($_SESSION['lockout'])) {
    header("Location: ../view/signin?error=rateLimited");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token validation failed.");
    }

    $emailOrUsername = trim($_POST["emailOrUsername"]);
    $password = trim($_POST["password"]);

    $user = $database->getUserByEmailOrUsername($emailOrUsername);

    if (!$user) {
        $database->setFailedAttempts();
        header("Location: ../view/signin?error=invalidUser");
    } else {
        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_fname'] = $user['fname'];
            $_SESSION['user_lname'] = $user['lname'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_username'] = $user['username'];

            header("Location: ../view/dashboard/");
        } else {
            $database->setFailedAttempts();
            header("Location: ../view/signin?error=invalidPassword");
        }
    }
}

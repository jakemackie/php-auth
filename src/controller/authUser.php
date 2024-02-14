<?php

require("..\\model\\Database.model.php");

$database = new Database();
$connection = $database->getConnection();

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailOrUsername = $_POST["emailOrUsername"];
    $password = $_POST["password"];

    $user = $database->getUserByEmailOrUsername($emailOrUsername);

    if (!$user) {
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
            header("Location: ../view/signin?error=incorrectPassword");
        }
    }
}

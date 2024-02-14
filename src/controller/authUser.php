<?php

require("..\\model\\Database.model.php");

$database = new Database();
$connection = $database->getConnection();

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameOrEmail = $_POST["usernameOrEmail"];

    $password = $_POST["password"];

    $user = $database->getUserByEmailOrUsername($usernameOrEmail);

    if (!$user) {
        echo "User not found.";
    } else {
        if (password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_fname'] = $user['fname'];
            $_SESSION['user_lname'] = $user['lname'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_username'] = $user['username'];

            header("Location: ../view/dashboard/");
        } else {
            echo "Incorrect password.";
        }
    }
}

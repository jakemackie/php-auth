<?php

require("..\\model\\Database.model.php");
require("..\\model\\User.model.php");

$database = new Database();
$connection = $database->getConnection();

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $user = new User($fname, $lname, $email, $username, $password);

    if ($database->getUserByEmailOrUsername($email)) {
        header("Location: ../view/create?error=emailTaken");
    } elseif ($database->getUserByEmailOrUsername($username)) {
        header("Location: ../view/create?error=usernameTaken");
    } else {
        $database->createUser($fname, $lname, $email, $username, $password);

        $_SESSION['user_fname'] = $user->getFname();
        $_SESSION['user_lname'] = $user->getLname();
        $_SESSION['user_email'] = $user->getEmail();
        $_SESSION['user_username'] = $user->getUsername();

        $user = $database->getUserByEmailOrUsername($email);
        $_SESSION['user_id'] = $user['id'];


        header("Location: ../view/dashboard/");
    }
}

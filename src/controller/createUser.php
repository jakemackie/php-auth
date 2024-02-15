<?php

require("..\\model\\Database.model.php");
require("..\\model\\User.model.php");

$database = new Database();
$connection = $database->getConnection();

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token validation failed.");
    }

    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = trim(password_hash($_POST["password"], PASSWORD_BCRYPT));

    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        header("Location: ../view/create?error=invalidEmail");
        exit;
    }

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

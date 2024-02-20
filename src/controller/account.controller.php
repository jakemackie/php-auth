<?php

include("../../model/Database.model.php");
include("../../model/User.model.php");

session_start();

class Account
{
    public $fname;
    public $lname;
    public $email;
    public $username;
    public $emailOrUsername;
    public $password;

    /**
     *  Takes the construcuted user and inserts them into the database.
     *
     * @param mysqli $connection The database connection.
     * @param string $fname The first name of the user.
     * @param string $lname The last name of the user.
     * @param string $email The email of the user.
     * @param string $username The username of the user.
     * @param string $password The password of the user.
     */

    public function register($fname, $lname, $email, $username, $password)
    {
        $database = new Database();

        // Adding all the fields to an array to check if they are empty.
        $fields = "{$fname}, 
                   {$lname}, 
                   {$email}, 
                   {$username}, 
                   {$password}";

        // Looping through the array and redirecting the user if any of the fields are empty.
        if (is_array($fields)) {
            foreach ($fields as $field) {
                if (empty($field)) {
                    header("Location: ../../view/create?error=incompleteForm");
                    exit();
                }
            }
        }

        // Checking length of first and last name.
        if (strlen($fname) < 2 || strlen($fname) < 2) {
            header("Location: ../../view/create?error=invalidName");
            exit;
        }
        // Checking length of username.
        if (strlen($username) < 3 || strlen($username) > 15) {
            header("Location: ../../view/create?error=invalidUsername");
            exit;
        }
        // Checking length of password.
        if (strlen($password) < 8) {
            header("Location: ../../view/create?error=invalidPassword");
            exit;
        }

        // Checking if the email is valid.
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            header("Location: ../../view/create?error=invalidEmail");
            exit;
        }
        // Checking if the username is valid.
        if (!preg_match("/^[a-z0-9_-]{3,15}$/", $username)) {
            header("Location: ../../view/create?error=invalidUsername");
            exit;
        }

        // Checking if the email or username is already taken.
        if ($database->getUserByEmailOrUsername($email) || $database->getUserByEmailOrUsername($username)) {
            header("Location: ../../view/create?error=userFound");
            exit;
        }

        $user = new User(
            $fname,
            $lname,
            $email,
            $username,
            $password,
        );

        $database->createUser(
            $user->getFname(),
            $user->getLname(),
            $user->getEmail(),
            $user->getUsername(),
            password_hash($password, PASSWORD_BCRYPT),
        );

        $_SESSION['user_fname'] = $user->getFname();
        $_SESSION['user_lname'] = $user->getLname();
        $_SESSION['user_email'] = $user->getEmail();
        $_SESSION['user_username'] = $user->getUsername();

        $user = $database->getUserByEmailOrUsername($email);
        $_SESSION['user_id'] = $user['id'];
        header("Location: ../../view/dashboard/");
    }

    /**
     *  Retrieves the user from the database and authenticates them.
     *
     * @param mysqli $connection The database connection.
     * @param string $email The email of the user.
     * @param string $username The username of the user.
     * @param string $password The password of the user.
     */

    public function login($emailOrUsername, $password)
    {
        $database = new Database();

        $fields = "{$emailOrUsername}, 
                   {$password}";

        // Looping through the array and redirecting the user if any of the fields are empty.
        if (is_array($fields)) {
            foreach ($fields as $field) {
                if (empty($field)) {
                    header("Location: ../../view/create?error=incompleteForm");
                    exit();
                }
            }
        }

        // Checking length of email or username
        if (strlen($emailOrUsername) < 2) {
            header("Location: ../../view/signin?error=invalidEmailOrUsername");
            exit;
        }
        // Checking length of password
        if (strlen($password) < 8) {
            header("Location: ../../view/signin?error=invalidPassword");
            exit;
        }

        // Checking against if the user exists
        if (!$database->getUserByEmailOrUsername($emailOrUsername)) {
            $database->setFailedAttempts();
            header("Location: ../../view/signin?error=userNotFound");
            exit;
        }

        $user = $database->getUserByEmailOrUsername($emailOrUsername);

        // Check is user exists
        if ($user) {
            if (password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_fname'] = $user['fname'];
                $_SESSION['user_lname'] = $user['lname'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_username'] = $user['username'];
                header("Location: ../../view/dashboard/");
            }
            // If the password is incorrect
            else {
                $database->setFailedAttempts();
                header("Location: ../../view/signin?error=invalidPassword");
                exit;
            }
        } else {
            $database->setFailedAttempts();
            header("Location: ../../view/signin?error=userNotFound");
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: ../../view/signin/");
        exit;
    }
}
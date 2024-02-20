<?php

session_start();
session_regenerate_id();

class Session
{
    public function identifyUser()
    {
        if (isset($_SESSION['user_id'])) {
            header("Location: ../../view/dashboard/");
            return true;
        } else {
            return false;
        }
    }

    public function regenerateCSRFToken()
    {
        $csrf_token = bin2hex(random_bytes(32));
        return $csrf_token;
    }

    public function getUserFirstName()
    {
        $fname = $_SESSION['user_fname'];
        return $fname;
    }

    public function getUserLastName()
    {
        $lname = $_SESSION['user_lname'];
        return $lname;
    }

    public function getUserEmail()
    {
        $email = $_SESSION['user_email'];
        return $email;
    }

    public function getUserUsername()
    {
        $username = $_SESSION['user_username'];
        return $username;
    }

    public function getUserId()
    {
        $id = $_SESSION['user_id'];
        return $id;
    }

    public function hasPermission()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../../view/signin/");
            exit;
        }
    }
}
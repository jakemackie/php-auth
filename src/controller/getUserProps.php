<?php

function getUserUsername()
{
    $username = $_SESSION['user_username'];
    return $username;
}

function getUserEmail()
{
    $email = $_SESSION['user_email'];
    return $email;
}

function getUserHiddenEmail()
{
    $email = $_SESSION['user_email'];
    $emailParts = explode('@', $email);
    $firstChar = substr($emailParts[0], 0, 1);
    $lastChar = substr($emailParts[0], -1);
    $maskedEmail = $firstChar . str_repeat('*', max(strlen($emailParts[0]) - 2, 0)) . $lastChar . '@' . $emailParts[1];
    if (strlen($emailParts[0]) < 3) {
        $maskedEmail = $email;
    }
    return $maskedEmail;
}

function getUserId()
{
    $id = $_SESSION['user_id'];
    return $id;
}

function getUserFirstName()
{
    $firstName = $_SESSION['user_fname'];
    return $firstName;
}

function getUserLastName()
{
    $lastName = $_SESSION['user_lname'];
    return $lastName;
}

function getUserFullName()
{
    $fullName = $_SESSION['user_fname'] . " " . $_SESSION['user_lname'];
    return $fullName;
}
<?php

include("../Account.controller.php");

$account = new Account();
$account->register(
    trim($_POST['fname']),
    trim($_POST['lname']),
    trim($_POST['email']),
    trim($_POST['username']),
    trim($_POST['password'])
);
<?php

include("../Account.controller.php");

$account = new Account();
$account->login(
    trim($_POST['emailOrUsername']),
    trim($_POST['password'])
);
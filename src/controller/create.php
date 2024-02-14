<?php

require("..\\..\\..\\model\\Database.model.php");

$database = new Database();
$connection = $database->getConnection();

if ($connection) {
    echo ("Connected to the database.");
}
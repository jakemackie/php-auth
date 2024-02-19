<?php

include("../model/Database.model.php");
include("../model/User.model.php");

session_start();

class Account
{

    public $database = new Database();
    public $connection = $this->database->getConnection();

    /**
     *  Takes the construcuted user and inserts them into the database.
     *
     * @param mysqli $connection The database connection.
     */
    public function register($connection)
    {

    }

}
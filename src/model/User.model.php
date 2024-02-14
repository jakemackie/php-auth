<?php

class User
{
    private $id;
    private $fname;
    private $lname;
    private $email;
    private $username;
    private $password;

    public function __construct($id, $fname, $lname, $email, $username, $password)
    {
        $this->id = $id;
        $this->setFname($fname);
        $this->setLname($lname);
        $this->setEmail($email);
        $this->setUsername($username);
        $this->setPassword($password);
    }

    public function getId()
    {
        return $this->id;
    }

    // Getters and Setters

    public function getFname()
    {
        return $this->fname;
    }

    public function getLname()
    {
        return $this->lname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the user's First Name.
     *
     * @param string $fname The user's First Name.
     */

    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * Sets the user's Last Name.
     *
     * @param string $lname The user's Last Name.
     */

    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * Sets the user's email.
     *
     * @param string $email The user's email.
     */

    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Sets the user's username.
     *
     * @param string $username The user's username.
     */

    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Sets the user's hashed password.
     *
     * @param string $password The user's password.
     */

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }
}
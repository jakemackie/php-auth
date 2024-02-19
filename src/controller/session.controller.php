<?php

session_start();

class Session
{
    public function identifyUser()
    {
        if (isset($_SESSION['user_id'])) {
            header("Location: ../../view/dashboard/");
            exit;
        }
    }
    public function regenerateCSRFToken()
    {
        $csrf_token = bin2hex(random_bytes(32));
        return $csrf_token;
    }
}
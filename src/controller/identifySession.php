<?php

session_start();

if (isset($_SESSION['user_id'])) {
    if (strpos($_SERVER['REQUEST_URI'], '/signin') !== false) {
        header("Location: ../dashboard/");
    }
}
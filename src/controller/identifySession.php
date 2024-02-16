<?php

if (isset($_SESSION['user_id'])) {
    if (strpos($_SERVER['REQUEST_URI'], '/signin') !== false) {
        header("Location: ../dashboard/");
    }
}

$_SESSION['failed_attempts'] = $_SESSION['failed_attempts'] ?? 0;

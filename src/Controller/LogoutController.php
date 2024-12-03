<?php

namespace App\Controllers;

class LogoutController {
    public function __construct() {
        session_start();
    }

    public function logout() {
        $_SESSION = [];
        session_destroy();
        header("Location: index.php?route=accueil");
        exit;
    }
}
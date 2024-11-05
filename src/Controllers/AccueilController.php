<?php

namespace App\Controllers;

class AccueilController {
    public function accueil() {
        require_once __DIR__ ."/../../views/accueil/accueil.php";
    }
    public function accueil_aide() {
        require_once __DIR__ ."/../../views/accueil/aide.php";
    }
}
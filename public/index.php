<?php
session_start();

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__.'/../config/bootstrap.php';
require_once __DIR__.'/../vendor/autoload.php';

$route = $_GET["route"] ?? 'accueil';

switch ($route) {
    case 'accueil':
        $accueilControlleur = new \App\Controllers\AccueilController;
        $accueilControlleur->accueil();
        break;
    case 'connexion':
        $accueilControlleur = new \App\Controllers\ConnexionController;
        $accueilControlleur->connexion();
        break;
    case 'inscription':
        $accueilControlleur = new \App\Controllers\InscriptionController;
        $accueilControlleur->inscription();
        break;
    default:
        echo "Page non trouvée";
        break;
}
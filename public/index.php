<?php

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */
$entityManager = require_once __DIR__.'/../config/bootstrap.php';
require_once __DIR__.'/../vendor/autoload.php';

// Récupération des routes
$routes = require_once __DIR__ . '/../config/routes.php';

// Récupération de l'URL actuelle
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Recherche de la route correspondante
if (!isset($routes[$uri])) {
    $errorController = new \App\Controller\ErrorController();
    $errorController->error404();
    exit;
}

// Récupération du contrôleur et de l'action
[$controllerName, $action] = $routes[$uri];
$controllerClass = "App\\Controller\\{$controllerName}";

try {
    // Instanciation du contrôleur avec l'EntityManager injecté
    $controller = new $controllerClass($entityManager);
    $controller->$action();
} catch (\Exception $e) {
    error_log($e->getMessage());
    $errorController = new \App\Controller\ErrorController();
    $errorController->error404();
}
<?php

return [
    '/' => ['HomeController', 'index'],
    '/legal' => ['HomeController', 'legal'],
    '/login' => ['UserController', 'login'],
    '/signup' => ['UserController', 'create'],
    '/logout' => ['UserController', 'logout'],
    '/accueil' => ['HomeController', 'accueil'],
    '/promotion/add' => ['PromotionController', 'promotion_add'],
    '/student/import' => ['PromotionController', 'import_students'],
];
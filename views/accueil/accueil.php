<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <link rel="stylesheet" href="./../../assets/css/style.css">
    <script src="./../../assets/js/script.js"></script>
</head>

<body class="flex flex-col min-h-screen">
    <?php require __DIR__ . "/../__partials/navbar.php"; ?>
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-gray-800">Bienvenue sur la page d'accueil de gestion de tâches</h1>
        <div class="mt-6">
            <h2 class="text-2xl font-semibold text-gray-700">Fonctionnalités</h2>
            <ul class="list-disc pl-6 mt-2">
                <li>Création de tâches simples et récurrentes</li>
                <li>Organisation des tâches par projets</li>
                <li>Suivi de l'avancement avec des statuts personnalisables</li>
                <li>Notifications pour les tâches à venir</li>
                <li>Interface utilisateur intuitive et réactive</li>
            </ul>
        </div>

        <div class="mt-6">
            <h2 class="text-2xl font-semibold text-gray-700">Pourquoi choisir notre application ?</h2>
            <p class="mt-2 text-gray-600">
                Notre gestionnaire de tâches vous aide à rester organisé et productif. Que ce soit pour des projets
                personnels ou professionnels, notre outil est conçu pour s'adapter à vos besoins.
            </p>
        </div>
    </div>
    <?php require __DIR__ . "/../__partials/footer.php"; ?>
</body>

</html>
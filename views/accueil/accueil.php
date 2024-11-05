<?php
// index.php

// Vous pouvez ajouter ici des logiques comme vérifier si l'utilisateur est connecté, etc.
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de sanctions - Accueil</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        /* Style global pour que le footer reste en bas */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Sépare le contenu et le footer */
        }

        .container {
            flex: 1; /* Remplir l'espace restant */
        }

        footer {
            /* Un peu de style pour le footer */
            background-color: #f8f9fa;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>

<body>

<!-- Inclusion du header -->
<?php require __DIR__ . "/../__partials/navbar.php"; ?>

<!-- Contenu principal -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <h1>Bienvenue sur la gestion des sanctions</h1>
            <p>
                Ce site est destiné à la gestion des sanctions dans notre lycée. Vous pouvez vous connecter ou créer un compte pour accéder aux fonctionnalités du site.
                Une fois connecté, vous pourrez consulter vos sanctions, demander une révision, et bien plus encore.
            </p>
        </div>
    </div>
</div>

<!-- Inclusion du footer -->
<?php require __DIR__ . "/../__partials/footer.php"; ?>

<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>

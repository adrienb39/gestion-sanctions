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
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <?php require __DIR__ . "/../__partials/navbar.php"; ?>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="display-4">Bienvenue sur le site de gestion des sanctions du lycée Gaudperr</h1>
                <p class="lead">
                    Ce site a été conçu pour vous permettre de gérer et suivre vos sanctions au sein de notre établissement scolaire. Que vous soyez un élève, un parent ou un membre du personnel, vous y trouverez toutes les informations nécessaires à la gestion des sanctions disciplinaires.
                </p>
                <div class="alert alert-info" role="alert">
                    <strong>Important :</strong> Pour accéder aux fonctionnalités de gestion, vous devez être connecté à votre compte. Si vous n'en avez pas encore, vous pouvez en créer un facilement.
                </div>
                <h3>Que pouvez-vous faire ?</h3>
                <ul>
                    <li><strong>Consulter vos sanctions</strong> : Visualisez la liste des sanctions que vous avez reçues et les détails associés.</li>
                    <li><strong>Demander une révision</strong> : Si vous estimez qu'une sanction est injustifiée, vous pouvez soumettre une demande de révision.</li>
                    <li><strong>Accéder à votre historique</strong> : Suivez l'évolution de votre situation disciplinaire au fil du temps.</li>
                </ul>
                <div class="mt-4">
                    <a href="/index.php?route=connexion" class="btn btn-primary">Se connecter</a>
                    <a href="/index.php?route=inscription" class="btn btn-secondary">Créer un compte</a>
                </div>
                <p class="mt-4">
                    Si vous avez besoin d'aide, vous pouvez consulter notre <a href="index.php?route=accueil-aide">section d'aide</a> ou nous contacter directement.
                </p>
            </div>
        </div>
    </div>
    <?php require __DIR__ . "/../__partials/footer.php"; ?>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

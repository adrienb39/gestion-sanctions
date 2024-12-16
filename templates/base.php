<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des sanctions</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <img src="../assets/images/logo-gestimag.png" class="img-fluid" style="width: 40px" alt="logo gestimag">
        <a class="navbar-brand" href="#">Gestion de sanctions</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex-md justify-content-md-center" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                </li>
                <?php if (!isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/signup">Créer un compte</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Création de promotion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Déconnexion</a>
                </li>
                <?php endif; ?>
            </ul>
            <?php if (!isset($_SESSION['user_id'])): ?>
            <div class="d-block d-md-none">
                <p>Vous accéder en tant que visiteur</p>
            </div>
            <?php else: ?>
            <div class="d-block d-md-none">
                <p><?= $_SESSION['nom'] ?> <?= $_SESSION['prenom'] ?></p>
            </div>
            <?php endif; ?>
        </div>
        <?php if (!isset($_SESSION['user_id'])): ?>
            <div class="d-md-block d-none">
                <p>Vous accéder en tant que visiteur</p>
            </div>
        <?php else: ?>
            <div class="d-md-block d-none">
                <p><?= $_SESSION['nom'] ?> <?= $_SESSION['prenom'] ?></p>
            </div>
        <?php endif; ?>
    </div>
</nav>

<main class="container mx-auto px-4 flex-grow">
    <?= $content ?>
</main>

<footer class="bg-light text-center py-4 mt-5">
    <p>&copy; 2024 Gestion des Sanctions - Tous droits réservés</p>
    <p>
        <a href="/legal">Mentions légales</a> |
        <a href="#">Contact</a> |
        <a href="#">Facebook</a> |
        <a href="#">Twitter</a>
    </p>
</footer>
</body>

</html>
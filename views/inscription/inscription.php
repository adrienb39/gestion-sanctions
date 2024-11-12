<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Gestion des sanctions</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
</head>

<body>
    <?php require __DIR__ . "/../__partials/navbar.php"; ?>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <h1>Créer un compte</h1>
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse e-mail</label>
                        <input type="email" class="form-control" id="email" name="email_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password_user" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirmation du mot de passe</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password_user" required>
                    </div>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </form>
                <?php if (!empty($error)) { ?>
                    <p class="text-danger"><?= $error; ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php require __DIR__ . "/../__partials/footer.php"; ?>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

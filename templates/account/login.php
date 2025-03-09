<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h1>Se connecter</h1>
            <?php
            if (isset($_SESSION['success_message'])) {
                echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
                unset($_SESSION['success_message']);
            }
            ?>
            <form action="#" method="POST" novalidate>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email_user" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password_user" required>
                </div>
                <div>
                    Pas encore de compte, <a href="/signup" class="text-decoration-none text-primary">inscrivez-vous !</a>
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
            <?php if (!empty($error)) { ?>
                <p class="text-danger"><?= $error; ?></p>
            <?php } ?>
        </div>
    </div>
</div>
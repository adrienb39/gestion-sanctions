<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <?php
            if (isset($_SESSION['success_message'])) {
                echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
                unset($_SESSION['success_message']);
            }
            ?>
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
                <a href="/login" class="btn btn-primary">Se connecter</a>
                <a href="/signup" class="btn btn-secondary">Créer un compte</a>
            </div>
            <p class="mt-4">
                Si vous avez besoin d'aide, vous pouvez consulter notre <a href="">section d'aide</a> ou nous contacter directement.
            </p>
        </div>
    </div>
</div>
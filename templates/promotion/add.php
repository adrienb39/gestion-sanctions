<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h1>Créer une promotion</h1>
            <form action="#" method="POST" novalidate>
                <div class="mb-3">
                    <label for="libelle_promotion" class="form-label">Libellé</label>
                    <input type="text" class="form-control" id="libelle_promotion" name="libelle_promotion" value="<?= $libellePromotion; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="annee_promotion" class="form-label">Année</label>
                    <input type="number" class="form-control" minlength="4" maxlength="4" id="annee_promotion" name="annee_promotion" value="<?php if (!isset($anneePromotion)) { $anneePromotion; } else {
                        $nowYear = new \DateTime();
                        echo $NowYear = $nowYear->format('Y');
                    } ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Créer la promotion</button>
            </form>
            <?php if (!empty($error)) { ?>
                <p class="text-danger"><?= $error; ?></p>
            <?php } ?>
        </div>
    </div>
</div>
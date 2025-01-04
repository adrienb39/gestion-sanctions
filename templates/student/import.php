<form action="#" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="csv_file" class="form-label">Sélectionner le fichier CSV</label>
        <input type="file" class="form-control" id="csv_file" name="csv_file" required>
    </div>
    <div class="mb-3">
        <label for="promotion" class="form-label">Sélectionner une promotion</label>
        <select class="form-select" id="promotion" name="promotion_id" required>
            <?php foreach ($promotions as $promotion): ?>
                <option value="<?= $promotion->getIdPromotion(); ?>">
                    <?= $promotion->getLibellePromotion(); ?> - <?= $promotion->getAnneePromotion(); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Importer</button>
</form>
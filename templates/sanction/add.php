<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h1>Créer une sanction</h1>
            <form action="#" method="POST">
                <div class="mb-3">
                    <label for="student_id" class="form-label">Élève</label>
                    <select class="form-select" id="student_id" name="student_id" required>
                        <?php foreach ($students as $student): ?>
                            <option value="<?= $student->getIdStudent() ?>"><?= $student->getPrenom() ?>
                                <?= $student->getNom() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="motif" class="form-label">Motif</label>
                    <input type="text" class="form-control" id="motif" name="motif" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="date_incident" class="form-label">Date de l'incident</label>
                    <input type="date" class="form-control" id="date_incident" name="date_incident" required>
                </div>
                <button type="submit" class="btn btn-primary">Créer la sanction</button>
            </form>
        </div>
    </div>
</div>
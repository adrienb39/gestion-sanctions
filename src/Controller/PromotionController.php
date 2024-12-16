<?php

namespace App\Controller;

use App\UserStory\CreatePromotion;
use Doctrine\ORM\EntityManager;

class PromotionController extends AbstractController {
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function promotion_add() {
        $error = [];
        $libellePromotion = '';
        $anneePromotion = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $libellePromotion = $_POST["libelle_promotion"];
            $anneePromotion = $_POST["annee_promotion"];

            try {
                $createPromotion = new CreatePromotion($this->entityManager);
                $promotion = $createPromotion->execute($libellePromotion, $anneePromotion);
                session_start();
                $_SESSION['success_message'] = "Promotion créé avec succès !";
                $this->redirect("/");
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }
        session_start();
        $this->render('promotion/add', [
            'libellePromotion' => $libellePromotion,
            'anneePromotion' => $anneePromotion,
            'error' => $error
        ]);
    }
}
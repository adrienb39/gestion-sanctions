<?php

namespace App\UserStory;

use App\Entity\Promotion;
use Doctrine\ORM\EntityManager;

class CreatePromotion
{
    private EntityManager $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        // L'entityManager est injecté par dépendance
        $this->entityManager = $entityManager;
    }

    // Cette méthode permettra d'exécuter la User Story
    public function execute(string $libellePromotion, string $anneePromotion): Promotion {
        // Vérifier que les données sont présentes
        if (empty($libellePromotion) || empty($anneePromotion)) {
            throw new \Exception("Tous les champs sont obligatoires");
        }

        if (strlen($anneePromotion) < 4 || strlen($anneePromotion) > 4 && !preg_match('/[0-9]/', $anneePromotion)) {
            throw new \Exception("L'année doit contenir 4 caractères et des chiffres");
        }

        // $currentDate = new \DateTime();
        // $nowAnnee = $currentDate->format('Y');
        // if ($anneePromotion < $nowAnnee) {
        //     throw new \Exception("L'année doit être égale ou supérieur à cette année");
        // }

        // Vérifier l'unicité du libellé et de l'année
        $existLibellePromotion = $this->entityManager->getRepository(Promotion::class)->findOneBy(['libellePromotion' => $libellePromotion]);
        $existAnneePromotion = $this->entityManager->getRepository(Promotion::class)->findOneBy(['anneePromotion' => $anneePromotion]);
        if ($existLibellePromotion && $existAnneePromotion) {
            throw new \Exception('La promotion est déjà existant');
        }

        // Créer une instance de l'entité User
        $promotion = new Promotion();
        $promotion->setLibellePromotion($libellePromotion);
        $promotion->setAnneePromotion($anneePromotion);

        // Persist l'instance en utilisant l'entityManager
        $this->entityManager->persist($promotion);
        $this->entityManager->flush();

        return $promotion;
    }
}

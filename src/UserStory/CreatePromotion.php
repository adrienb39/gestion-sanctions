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

        // Vérifier l'unicité de l'email
        $existLibellePromotion = $this->entityManager->getRepository(Promotion::class)->findOneBy(['libellePromotion' => $libellePromotion]);
        if ($existLibellePromotion) {
            throw new \Exception('Libellé de la promotion déjà existant');
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

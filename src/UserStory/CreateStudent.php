<?php

namespace App\UserStory;

use App\Entity\Student;
use App\Entity\Promotion;
use Doctrine\ORM\EntityManager;

class CreateStudent
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
    public function execute(string $prenom, string $nom, Promotion $promotion): Student
    {
        // Vérifier que les données sont présentes
        if (empty($prenom) || empty($nom)) {
            throw new \Exception("Tous les champs sont obligatoires");
        }

        // Créer une instance de l'entité Student
        $student = new Student();
        $student->setPrenom($prenom);
        $student->setNom($nom);
        $student->setPromotion($promotion);

        // Persist l'instance en utilisant l'entityManager
        $this->entityManager->persist($student);
        $this->entityManager->flush();

        return $student;
    }
}

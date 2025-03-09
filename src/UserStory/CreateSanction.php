<?php

namespace App\UserStory;

use App\Entity\Sanction;
use App\Entity\Student;
use App\Entity\User;
use Doctrine\ORM\EntityManager;

class CreateSanction
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function execute(int $studentId, string $motif, string $description, \DateTime $dateIncident, int $userId): Sanction
    {
        if (empty($motif) || empty($description)) {
            throw new \Exception("Tous les champs sont obligatoires.");
        }

        $student = $this->entityManager->getRepository(Student::class)->find($studentId);
        $user = $this->entityManager->getRepository(User::class)->find($userId);

        if (!$student || !$user) {
            throw new \Exception("Élève ou utilisateur invalide.");
        }

        $sanction = new Sanction();
        $sanction->setStudent($student);
        $sanction->setUser($user);
        $sanction->setMotif($motif);
        $sanction->setDescription($description);
        $sanction->setDateIncident($dateIncident);
        $sanction->setDateCreation(new \DateTime());

        $this->entityManager->persist($sanction);
        $this->entityManager->flush();

        return $sanction;
    }
}
<?php

namespace App\Controller;

use App\UserStory\CreateSanction;
use App\Entity\Sanction;
use App\Entity\Student;
use Doctrine\ORM\EntityManager;

class SanctionController extends AbstractController
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function sanction_add()
    {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            session_start();
            $_SESSION['success_message'] = "Vous devez être connecté pour accéder à cette page !";
            $this->redirect("/login");
        }
        
        $error = [];
        $students = $this->entityManager->getRepository(Student::class)->findAll();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $createSanction = new CreateSanction($this->entityManager);
                $createSanction->execute(
                    $_POST["student_id"],
                    $_POST["motif"],
                    $_POST["description"],
                    new \DateTime($_POST["date_incident"]),
                    $_SESSION['user_id']
                );
                $_SESSION['success_message'] = "Sanction créée avec succès !";
                $this->redirect("/");
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }

        $this->render('sanction/add', [
            'students' => $students,
            'error' => $error
        ]);
    }
}
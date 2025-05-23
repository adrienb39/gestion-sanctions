<?php

namespace App\Controller;

use App\UserStory\CreateSanction;
use App\Entity\Sanction;
use App\Entity\Student;
use App\Entity\Enseignant;
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
        $_POST["student_id"] = '';
        $_POST["motif"] = '';
        $_POST["description"] = '';
        $_POST["date_incident"] = '';
        $students = $this->entityManager->getRepository(Student::class)->findAll();
        $query = $this->entityManager->createQuery('SELECT e FROM \App\Entity\Enseignant e ORDER BY e.nom, e.prenom, e.code ASC');
        $enseignants = $query->getResult();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            try {
                $createSanction = new CreateSanction($this->entityManager);
                $createSanction->execute(
                    $_POST["student_id"],
                    $_POST["motif"],
                    $_POST["description"],
                    new \DateTime($_POST["date_incident"]),
                    $_SESSION['user_id'],
                    $this->entityManager->getRepository(Enseignant::class)->find($_POST["enseignant_id"])
                );
                $_SESSION['success_message'] = "Sanction créée avec succès !";
                $this->redirect("/");
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }

        $this->render('sanction/add', [
            'student' => $_POST["student_id"],
            'motif' => $_POST["motif"],
            'description' => $_POST["description"],
            'date_incident' => $_POST["date_incident"],
            'students' => $students,
            'error' => $error,
            'enseignants' => $enseignants
        ]);
    }
}
<?php

namespace App\Controller;

use App\Entity\Promotion;
use App\Entity\Student;
use App\UserStory\CreatePromotion;
use App\UserStory\CreateStudent;
use Doctrine\ORM\EntityManager;

class PromotionController extends AbstractController
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function promotion_add()
    {
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
        if (!isset($_SESSION['user_id'])) {
            session_start();
            $_SESSION['success_message'] = "Vous devez être connecté pour accéder à cette page !";
            $this->redirect("/login");
        }
        $this->render('promotion/add', [
            'libellePromotion' => $libellePromotion,
            'anneePromotion' => $anneePromotion,
            'error' => $error
        ]);
    }

    public function import_students()
    {
        session_start();
        // Vérification si l'utilisateur est connecté
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['error_message'] = "Vous devez être connecté pour accéder à cette page !";
            $this->redirect("/login");
        }

        // Récupérer les promotions existantes
        $promotions = $this->entityManager->getRepository(Promotion::class)->findAll();
        $error = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csv_file"])) {
            $file = $_FILES["csv_file"]["tmp_name"];
            if (($handle = fopen($file, "r")) !== false) {
                // Lecture du fichier CSV
                $students = [];
                $lineNumber = 0;
                while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                    // Ignorer la première ligne (entête)
                    if ($lineNumber == 0) {
                        $lineNumber++;
                        continue;
                    }

                    // Ajouter les données de la ligne dans le tableau $students
                    $students[] = $data;
                    $lineNumber++;
                }
                fclose($handle);

                // Validation du CSV
                foreach ($students as $studentData) {
                    if (count($studentData) < 2) {
                        $error[] = "Le fichier CSV doit contenir deux colonnes : Prénom et Nom.";
                        break;
                    }

                    // Création de l'étudiant et association avec la promotion
                    $promotion = $this->entityManager->getRepository(Promotion::class)->find($_POST['promotion_id']);
                    if (!$promotion) {
                        $error[] = "La promotion sélectionnée n'existe pas.";
                        break;
                    }

                    try {
                        // Appeler la méthode de la classe CreateStudent
                        $createStudent = new CreateStudent($this->entityManager);
                        $student = $createStudent->execute($studentData[0], $studentData[1], $promotion);
                    } catch (\Exception $e) {
                        $error[] = "Erreur lors de l'ajout de l'étudiant : " . $e->getMessage();
                    }
                }

                if (empty($error)) {
                    session_start();
                    $_SESSION['success_message'] = "Importation réussie : " . count($students) . " étudiants importés.";
                    $this->redirect("/");
                }
            }
        }
        session_start();
        if (!isset($_SESSION['user_id'])) {
            session_start();
            $_SESSION['success_message'] = "Vous devez être connecté pour accéder à cette page !";
            $this->redirect("/login");
        }

        // Rendu du formulaire d'importation
        $this->render('student/import', [
            'promotions' => $promotions,
            'error' => $error
        ]);
    }
}
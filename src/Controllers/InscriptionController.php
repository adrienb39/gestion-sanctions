<?php

namespace App\Controllers;

use App\UserStory\CreerCompte;
use Doctrine\ORM\EntityManager;

class InscriptionController {
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST["nom_user"];
            $prenom = $_POST["prenom_user"];
            $email = $_POST["email_user"];
            $password = $_POST["password_user"];
            $confirmPassword = $_POST["confirm_password_user"];

            try {
                $createAccount = new CreerCompte($this->entityManager);
                $user = $createAccount->execute($nom, $prenom, $email, $password, $confirmPassword);
                header("Location: /index.php?route=connexion");
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }
        require __DIR__ ."/../../views/inscription/inscription.php";
    }
}
<?php

namespace App\Controller;

use App\UserStory\CreerCompte;
use Doctrine\ORM\EntityManager;

class SignupController extends AbstractController {
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function index(): void {
        $this->render('account/signup');
    }

    public function create() {
        $error = [];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = $_POST["nom_user"];
            $prenom = $_POST["prenom_user"];
            $email = $_POST["email_user"];
            $password = $_POST["password_user"];
            $confirmPassword = $_POST["confirm_password_user"];

            try {
                $createAccount = new CreerCompte($this->entityManager);
                $user = $createAccount->execute($nom, $prenom, $email, $password, $confirmPassword);
                session_start();
                $_SESSION['success_message'] = "Compte créé avec succès !";
                $this->redirect("/login");
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }
        $this->render('account/signup', [
            'error' => $error
        ]);
    }
}
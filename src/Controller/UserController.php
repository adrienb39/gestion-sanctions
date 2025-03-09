<?php

namespace App\Controller;

use App\UserStory\CreerCompte;
use App\UserStory\LoginUser;
use Doctrine\ORM\EntityManager;

class UserController extends AbstractController {
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function index(): void {
        $this->render('account/signup');
    }

    public function create() {
        $error = [];
        $nom = '';
        $prenom = '';
        $email = '';
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
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'error' => $error
        ]);
    }

    public function login() {
        $error = [];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email_user"];
            $password = $_POST["password_user"];
            try {
                $loginUser = new LoginUser($this->entityManager);
                $user = $loginUser->execute($email, $password);
                session_start();
                $_SESSION['success_message'] = "Vous êtes connecté avec succès !";
                $this->redirect("/");
            } catch (\Exception $e) {
                $error = $e->getMessage();
            }
        }
        session_start();
        $this->render('account/login', [
            'error' => $error
        ]);
    }

    public function logout() {
        session_start();
        session_destroy();
        $_SESSION['success_message'] = "Vous avez bien été déconnecté !";
        $this->redirect("/");
        exit;
    }
}
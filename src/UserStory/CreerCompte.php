<?php

namespace App\UserStory;

use App\Entity\User;
use Doctrine\ORM\EntityManager;

class CreerCompte
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
    public function execute(string $nom, string $prenom, string $email, string $password, string $confirmPassword): User {
        // Vérifier que les données sont présentes
        if (empty($nom) || empty($prenom) || empty($email) || empty($password) || empty($confirmPassword)) {
            throw new \Exception("Tous les champs sont obligatoires");
        }

        // Vérifier si l'email est valide
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Email invalide");
        }

        // Vérifier si le mot de passe est sécurisé
        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
            throw new \Exception("Le mot de passe doit contenir au moins 8 caractères, avec des majuscules, des minuscules et des chiffres");
        }

        // Vérifier l'unicité de l'email
        $existEmail = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        if ($existEmail) {
            throw new \Exception('Email déjà existant');
        }

        // Vérifier si les mots de passe correspondent
        if ($password !== $confirmPassword) {
            throw new \Exception("Les mots de passe ne correspondent pas.");
        }

        // Hash le mot de passe
        $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

        // Créer une instance de l'entité User
        $user = new User();
        $user->setNom($nom);
        $user->setPrenom($prenom);
        $user->setEmail($email);
        $user->setPassword($passwordHashed);

        // Persist l'instance en utilisant l'entityManager
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        echo "Un mail de confirmation a été envoyé à l'utilisateur";

        return $user;
    }
}

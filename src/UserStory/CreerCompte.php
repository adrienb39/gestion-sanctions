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
    public function execute(string $pseudo, string $email, string $password): User {
        // Vérifier que les données sont présentes
        // Si tel n'est pas le cas, lancer une exception
        if (empty($pseudo) || empty($email) || empty($password)) {
            throw new \Exception("Tous les champs sont obligatoires");
        }

        // Vérifier si l'email est valide
        // Si tel n'est pas le cas, lancer une exception
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception("Email invalide");
        }

        // Vérifier si le pseudo est entre 2 et 50 caractères
        // Si tel n'est pas le cas, lancer une exception
        if (strlen($pseudo) < 2 || strlen($pseudo) > 50) {
            throw new \Exception("Le pseudo doit contenir entre 2 et 50 caractères");
        }

        // Vérifier si le mot de passe est sécurisé
        // Si tel n'est pas le cas, lancer une exception
        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
            throw new \Exception("Le mot de passe doit contenir au moins 8 caractères, avec des majuscules, des minuscules et des chiffres");
        }

        // Vérifier l'unicité de l'email
        // Si tel n'est pas le cas, lancer une exception
        $existEmail = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        if ($existEmail) {
            throw new \Exception('Email déjà existant');
        }

        // Insérer les données dans la base de données
        // 1. Hash le mot de passe
        $password = password_hash($password, PASSWORD_DEFAULT);

        // 2. Créer une instance de la classe User
        $user = new User();
        $user->setPseudo($pseudo);
        $user->setEmail($email);
        $user->setPassword($password);

        // 3. Persist l'instance en utilisant l'entityManager
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        // Envoi du mail de confirmation
        echo "Un mail de confirmation a été envoyé à l'utilisateur";

        return $user;
    }
}
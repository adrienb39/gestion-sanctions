<?php

namespace App\UserStory;

use App\Entity\User;
use Doctrine\ORM\EntityManager;

class LoginUser {
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function execute(string $email, string $password): void {
        if (empty($email) || empty($password)) {
            throw new \Exception("Tous les champs sont obligatoires");
        }
        $user = $this->entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
        if (!$user || !password_verify($password, $user->getPassword())) {
            throw new \Exception("Email ou mot de pass incorrect");
        }
        session_start();
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['pseudo'] = $user->getPseudo();
    }
}
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\Column(name: 'id_user', type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;
    #[ORM\Column(name: 'nom_user', type: 'string', length: 50)]
    private string $nom;
    #[ORM\Column(name: 'prenom_user', type: 'string', length: 50)]
    private string $prenom;
    #[ORM\Column(name: 'email_user', type: 'string', length: 100, unique: true)]
    private string $email;
    #[ORM\Column(name: 'password_user', type: 'string', length: 200)]
    private string $password;

    public function getId(): int {
        return $this->id;
    }
    public function getNom(): string {
        return $this->nom;
    }
    public function getPrenom(): string {
        return $this->prenom;
    }
    public function getEmail(): string {
        return $this->email;
    }
    public function getPassword(): string {
        return $this->password;
    }
}
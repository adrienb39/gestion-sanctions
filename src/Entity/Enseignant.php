<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'enseignants')]
class Enseignant
{
    #[ORM\Id]
    #[ORM\Column(name: 'id_enseignant', type: 'integer')]
    #[ORM\GeneratedValue]
    private int $id;

    #[ORM\Column(name: 'code_enseignant', type: 'integer', unique: true)]
    private int $code;

    #[ORM\Column(name: 'nom_enseignant', type: 'string', length: 50)]
    private string $nom;

    #[ORM\Column(name: 'prenom_enseignant', type: 'string', length: 50)]
    private string $prenom;

    // Getters and Setters
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }
}
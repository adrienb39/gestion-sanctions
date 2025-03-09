<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'students')]
class Student
{
    #[ORM\Id]
    #[ORM\Column(name: 'id_student', type: 'integer')]
    #[ORM\GeneratedValue]
    private int $idStudent;

    #[ORM\Column(name: 'prenom_student', type: 'string', length: 255)]
    private string $prenom;

    #[ORM\Column(name: 'nom_student', type: 'string', length: 255)]
    private string $nom;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Promotion')]
    #[ORM\JoinColumn(name: 'id_promotion', referencedColumnName: 'id_promotion')]
    private Promotion $promotion;

    // Getter and Setter for idStudent
    public function getIdStudent(): int
    {
        return $this->idStudent;
    }

    public function setIdStudent(int $idStudent): void
    {
        $this->idStudent = $idStudent;
    }

    // Getter and Setter for firstName
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    // Getter and Setter for lastName
    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    // Getter and Setter for promotion
    public function getPromotion(): Promotion
    {
        return $this->promotion;
    }

    public function setPromotion(Promotion $promotion): void
    {
        $this->promotion = $promotion;
    }
}

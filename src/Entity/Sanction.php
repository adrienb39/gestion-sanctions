<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'sanctions')]
class Sanction
{
    #[ORM\Id]
    #[ORM\Column(name: 'id_sanction', type: 'integer')]
    #[ORM\GeneratedValue]
    private int $idSanction;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\Student')]
    #[ORM\JoinColumn(name: 'id_student', referencedColumnName: 'id_student')]
    private Student $student;

    #[ORM\ManyToOne(targetEntity: 'App\Entity\User')]
    #[ORM\JoinColumn(name: 'id_user', referencedColumnName: 'id_user')]
    private User $user;

    #[ORM\Column(name: 'motif', type: 'string', length: 255)]
    private string $motif;

    #[ORM\Column(name: 'description', type: 'text')]
    private string $description;

    #[ORM\Column(name: 'date_incident', type: 'datetime')]
    private \DateTime $dateIncident;

    #[ORM\Column(name: 'date_creation', type: 'datetime')]
    private \DateTime $dateCreation;

    // Getters and Setters
    public function getIdSanction(): int
    {
        return $this->idSanction;
    }

    public function setIdSanction(int $idSanction): void
    {
        $this->idSanction = $idSanction;
    }

    public function getStudent(): Student
    {
        return $this->student;
    }

    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getMotif(): string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): void
    {
        $this->motif = $motif;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDateIncident(): \DateTime
    {
        return $this->dateIncident;
    }

    public function setDateIncident(\DateTime $dateIncident): void
    {
        $this->dateIncident = $dateIncident;
    }

    public function getDateCreation(): \DateTime
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTime $dateCreation): void
    {
        $this->dateCreation = $dateCreation;
    }
}
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'promotions')]
class Promotion
{
    #[ORM\Id]
    #[ORM\Column(name: 'id_promotion', type: 'integer')]
    #[ORM\GeneratedValue]
    private int $idPromotion;
    #[ORM\Column(name: 'libelle_promotion', type: 'string', length: 10, unique: true)]
    private string $libellePromotion;
    #[ORM\Column(name: 'annee_promotion', type: 'string', length: 4, unique: true)]
    private string $anneePromotion;

    public function getIdPromotion(): int
    {
        return $this->idPromotion;
    }

    public function setIdPromotion(int $idPromotion): void
    {
        $this->idPromotion = $idPromotion;
    }

    public function getLibellePromotion(): string
    {
        return $this->libellePromotion;
    }

    public function setLibellePromotion(string $libellePromotion): void
    {
        $this->libellePromotion = $libellePromotion;
    }

    public function getAnneePromotion(): string
    {
        return $this->anneePromotion;
    }

    public function setAnneePromotion(string $anneePromotion): void
    {
        $this->anneePromotion = $anneePromotion;
    }
}
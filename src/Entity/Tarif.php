<?php

namespace App\Entity;

use App\Repository\TarifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TarifRepository::class)]
class Tarif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $PrixParHeure;

    #[ORM\Column(type: 'integer')]
    private $PrixParJour;

    #[ORM\ManyToOne(targetEntity: Photographe::class, inversedBy: 'tarifs')]
    private $photographe;

    #[ORM\ManyToOne(targetEntity: TypePrestation::class, inversedBy: 'tarifs')]
    private $typePrestations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixParHeure(): ?int
    {
        return $this->PrixParHeure;
    }

    public function setPrixParHeure(int $PrixParHeure): self
    {
        $this->PrixParHeure = $PrixParHeure;

        return $this;
    }

    public function getPrixParJour(): ?int
    {
        return $this->PrixParJour;
    }

    public function setPrixParJour(int $PrixParJour): self
    {
        $this->PrixParJour = $PrixParJour;

        return $this;
    }

    public function getPhotographe(): ?Photographe
    {
        return $this->photographe;
    }

    public function setPhotographe(?Photographe $photographe): self
    {
        $this->photographe = $photographe;

        return $this;
    }

    public function getTypePrestations(): ?TypePrestation
    {
        return $this->typePrestations;
    }

    public function setTypePrestations(?TypePrestation $typePrestations): self
    {
        $this->typePrestations = $typePrestations;

        return $this;
    }
}

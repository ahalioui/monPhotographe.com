<?php

namespace App\Entity;

use App\Repository\PrestationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestationRepository::class)]
class Prestation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $DatePrestation;

    #[ORM\Column(type: 'time')]
    private $Heure;

    #[ORM\Column(type: 'integer')]
    private $NombreHeure;

    #[ORM\Column(type: 'string', length: 255)]
    private $Rue;

    #[ORM\Column(type: 'string', length: 255)]
    private $RuePrestation;

    #[ORM\Column(type: 'string', length: 10)]
    private $NumeroRuePrestation;

    #[ORM\Column(type: 'string', length: 10)]
    private $CodePostalPrestation;

    #[ORM\Column(type: 'integer')]
    private $Total;

    #[ORM\ManyToOne(targetEntity: Client::class, inversedBy: 'prestations')]
    private $client;

    #[ORM\ManyToOne(targetEntity: Photographe::class, inversedBy: 'prestations')]
    private $photographe;

    #[ORM\ManyToOne(targetEntity: TypePrestation::class, inversedBy: 'prestations')]
    private $typePrestations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePrestation(): ?\DateTimeInterface
    {
        return $this->DatePrestation;
    }

    public function setDatePrestation(\DateTimeInterface $DatePrestation): self
    {
        $this->DatePrestation = $DatePrestation;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->Heure;
    }

    public function setHeure(\DateTimeInterface $Heure): self
    {
        $this->Heure = $Heure;

        return $this;
    }

    public function getNombreHeure(): ?int
    {
        return $this->NombreHeure;
    }

    public function setNombreHeure(int $NombreHeure): self
    {
        $this->NombreHeure = $NombreHeure;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->Rue;
    }

    public function setRue(string $Rue): self
    {
        $this->Rue = $Rue;

        return $this;
    }

    public function getRuePrestation(): ?string
    {
        return $this->RuePrestation;
    }

    public function setRuePrestation(string $RuePrestation): self
    {
        $this->RuePrestation = $RuePrestation;

        return $this;
    }

    public function getNumeroRuePrestation(): ?string
    {
        return $this->NumeroRuePrestation;
    }

    public function setNumeroRuePrestation(string $NumeroRuePrestation): self
    {
        $this->NumeroRuePrestation = $NumeroRuePrestation;

        return $this;
    }

    public function getCodePostalPrestation(): ?string
    {
        return $this->CodePostalPrestation;
    }

    public function setCodePostalPrestation(string $CodePostalPrestation): self
    {
        $this->CodePostalPrestation = $CodePostalPrestation;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->Total;
    }

    public function setTotal(int $Total): self
    {
        $this->Total = $Total;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

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

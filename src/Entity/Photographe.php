<?php

namespace App\Entity;

use App\Repository\PhotographeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotographeRepository::class)]
class Photographe extends User
{
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $TVA;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $Photo;

  
    #[ORM\OneToMany(mappedBy: 'photographe', targetEntity: Prestation::class)]
    private $prestations;

    #[ORM\OneToMany(mappedBy: 'photographe', targetEntity: Tarif::class)]
    private $tarifs;

    public function __construct()
    {
        $this->prestations = new ArrayCollection();
        $this->tarifs = new ArrayCollection();
    }

  
    
    public function getTVA(): ?string
    {
        return $this->TVA;
    }

    public function setTVA(string $TVA): self
    {
        $this->TVA = $TVA;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->Photo;
    }

    public function setPhoto(string $Photo): self
    {
        $this->Photo = $Photo;

        return $this;
    }

  
    /**
     * @return Collection<int, Prestation>
     */
    public function getPrestations(): Collection
    {
        return $this->prestations;
    }

    public function addPrestation(Prestation $prestation): self
    {
        if (!$this->prestations->contains($prestation)) {
            $this->prestations[] = $prestation;
            $prestation->setPhotographe($this);
        }

        return $this;
    }

    public function removePrestation(Prestation $prestation): self
    {
        if ($this->prestations->removeElement($prestation)) {
            // set the owning side to null (unless already changed)
            if ($prestation->getPhotographe() === $this) {
                $prestation->setPhotographe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tarif>
     */
    public function getTarifs(): Collection
    {
        return $this->tarifs;
    }

    public function addTarif(Tarif $tarif): self
    {
        if (!$this->tarifs->contains($tarif)) {
            $this->tarifs[] = $tarif;
            $tarif->setPhotographe($this);
        }

        return $this;
    }

    public function removeTarif(Tarif $tarif): self
    {
        if ($this->tarifs->removeElement($tarif)) {
            // set the owning side to null (unless already changed)
            if ($tarif->getPhotographe() === $this) {
                $tarif->setPhotographe(null);
            }
        }

        return $this;
    }
}

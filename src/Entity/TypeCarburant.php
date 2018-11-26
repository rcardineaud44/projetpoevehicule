<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeCarburantRepository")
 */
class TypeCarburant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Voiture", mappedBy="typeCarburant")
     */
    private $IdVoiture;

    public function __construct()
    {
        $this->IdVoiture = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return Collection|Voiture[]
     */
    public function getIdVoiture(): Collection
    {
        return $this->IdVoiture;
    }

    public function addIdVoiture(Voiture $idVoiture): self
    {
        if (!$this->IdVoiture->contains($idVoiture)) {
            $this->IdVoiture[] = $idVoiture;
            $idVoiture->setTypeCarburant($this);
        }

        return $this;
    }

    public function removeIdVoiture(Voiture $idVoiture): self
    {
        if ($this->IdVoiture->contains($idVoiture)) {
            $this->IdVoiture->removeElement($idVoiture);
            // set the owning side to null (unless already changed)
            if ($idVoiture->getTypeCarburant() === $this) {
                $idVoiture->setTypeCarburant(null);
            }
        }

        return $this;
    }
}

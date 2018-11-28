<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\AbstractType;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoitureRepository")
 */
class Voiture
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
    private $Reference;

    /**
     * @ORM\Column(type="integer")
     */
    private $kilometrage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeCarburant", inversedBy="IdVoiture")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeCarburant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lieu", inversedBy="voiture")
     */
    private $lieu;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Disponibilite;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservation", mappedBy="vehicule")
     */
    private $voiture_id;

    public function __construct()
    {
        $this->voiture_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->Reference;
    }

    public function setReference(string $Reference): self
    {
        $this->Reference = $Reference;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): self
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getTypeCarburant(): ?TypeCarburant
    {
        return $this->typeCarburant;
    }

    public function setTypeCarburant(?TypeCarburant $typeCarburant): self
    {
        $this->typeCarburant = $typeCarburant;

        return $this;
    }

    public function getLieu(): ?Lieu
    {
        return $this->lieu;
    }

    public function setLieu(?Lieu $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDisponibilite(): ?bool
    {
        return $this->Disponibilite;
    }

    public function setDisponibilite(bool $Disponibilite): self
    {
        $this->Disponibilite = $Disponibilite;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getVoitureId(): Collection
    {
        return $this->voiture_id;
    }

    public function addVoitureId(Reservation $voitureId): self
    {
        if (!$this->voiture_id->contains($voitureId)) {
            $this->voiture_id[] = $voitureId;
            $voitureId->setVehicule($this);
        }

        return $this;
    }

    public function removeVoitureId(Reservation $voitureId): self
    {
        if ($this->voiture_id->contains($voitureId)) {
            $this->voiture_id->removeElement($voitureId);
            // set the owning side to null (unless already changed)
            if ($voitureId->getVehicule() === $this) {
                $voitureId->setVehicule(null);
            }
        }

        return $this;
    }
}

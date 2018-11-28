<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $litreCarburant;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $montantCarburant;

    /**
     * @ORM\Column(type="integer")
     */
    private $kmParcouru;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $destination;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NatureDeplacement", inversedBy="nature_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nature;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voiture", inversedBy="voiture_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehicule;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateUtilisation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lieu", inversedBy="lieu_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieu;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Conducteur", inversedBy="reservation_id")
     */
    private $conducteur;

    public function __construct()
    {
        $this->conducteur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getLitreCarburant()
    {
        return $this->litreCarburant;
    }

    public function setLitreCarburant($litreCarburant): self
    {
        $this->litreCarburant = $litreCarburant;

        return $this;
    }

    public function getMontantCarburant()
    {
        return $this->montantCarburant;
    }

    public function setMontantCarburant($montantCarburant): self
    {
        $this->montantCarburant = $montantCarburant;

        return $this;
    }

    public function getKmParcouru(): ?int
    {
        return $this->kmParcouru;
    }

    public function setKmParcouru(int $kmParcouru): self
    {
        $this->kmParcouru = $kmParcouru;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getNature(): ?NatureDeplacement
    {
        return $this->nature;
    }

    public function setNature(?NatureDeplacement $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getVehicule(): ?Voiture
    {
        return $this->vehicule;
    }

    public function setVehicule(?Voiture $vehicule): self
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getDateUtilisation(): ?\DateTimeInterface
    {
        return $this->dateUtilisation;
    }

    public function setDateUtilisation(\DateTimeInterface $dateUtilisation): self
    {
        $this->dateUtilisation = $dateUtilisation;

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

    /**
     * @return Collection|Conducteur[]
     */
    public function getConducteur(): Collection
    {
        return $this->conducteur;
    }

    public function addConducteur(Conducteur $conducteur): self
    {
        if (!$this->conducteur->contains($conducteur)) {
            $this->conducteur[] = $conducteur;
        }

        return $this;
    }

    public function removeConducteur(Conducteur $conducteur): self
    {
        if ($this->conducteur->contains($conducteur)) {
            $this->conducteur->removeElement($conducteur);
        }

        return $this;
    }
}

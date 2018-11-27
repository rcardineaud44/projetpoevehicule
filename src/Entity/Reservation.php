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
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $litre_carburant;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $montant_carburant;

    /**
     * @ORM\Column(type="integer")
     */
    private $km_parcourus;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lieu", inversedBy="lieu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $lieu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NatureDeplacement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nature_deplacement;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voiture")
     * @ORM\JoinColumn(nullable=false)
     */
    private $vehicule;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Conducteur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $conduteur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getlitres_carburant()
    {
        return $this->litre_carburant;
    }

    public function setLitreCarburant($litre_carburant): self
    {
        $this->litre_carburant = $litre_carburant;

        return $this;
    }

    public function getmontant_carburant()
    {
        return $this->montant_carburant;
    }

    public function setMontantCarburant($montant_carburant): self
    {
        $this->montant_carburant = $montant_carburant;

        return $this;
    }

    public function getkm_parcourus(): ?int
    {
        return $this->km_parcourus;
    }

    public function setKmParcourus(int $km_parcourus): self
    {
        $this->km_parcourus = $km_parcourus;

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

    public function getLieu(): ?Lieu
    {
        return $this->lieu_id;
    }

    public function setLieu(?Lieu $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getNatureDeplacement(): ?NatureDeplacement
    {
        return $this->nature_deplacement;
    }

    public function setNatureDeplacement(?NatureDeplacement $nature_deplacement): self
    {
        $this->nature_deplacement = $nature_deplacement;

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

    public function getConduteur(): ?Conducteur
    {
        return $this->conduteur;
    }

    public function setConduteur(?Conducteur $conduteur): self
    {
        $this->conduteur = $conduteur;

        return $this;
    }

}

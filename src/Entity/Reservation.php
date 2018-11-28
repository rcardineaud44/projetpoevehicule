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
    private $kmParcourus;

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
    private $natureDeplacement;

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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $destination;

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
        return $this->litreCarburant;
    }

    public function litreCarburant()
    {
        return $this->litreCarburant;
    }


    public function setLitreCarburant($litreCarburant): self
    {
        $this->litreCarburant = $litreCarburant;

        return $this;
    }

    public function getmontant_carburant()
    {
        return $this->montantCarburant;
    }

    public function montantCarburant()
    {
        return $this->montantCarburant;
    }



    public function setMontantCarburant($montantCarburant): self
    {
        $this->montantCarburant = $montantCarburant;

        return $this;
    }

    public function getkm_parcourus(): ?int
    {
        return $this->kmParcourus;
    }

    public function kmParcourus(): ?int
    {
        return $this->kmParcourus;
    }


    public function setKmParcourus(int $kmParcourus): self
    {
        $this->kmParcourus = $kmParcourus;

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
        return $this->lieu;
    }

    public function setLieu(?Lieu $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getNatureDeplacement(): ?NatureDeplacement
    {
        return $this->natureDeplacement;
    }

    public function setNatureDeplacement(?NatureDeplacement $natureDeplacement): self
    {
        $this->natureDeplacement = $natureDeplacement;

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

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

}

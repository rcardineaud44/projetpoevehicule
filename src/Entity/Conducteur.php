<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ConducteurRepository")
 */
class Conducteur
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
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Reservation", mappedBy="conducteur")
     */
    private $reservation_id;

    public function __construct()
    {
        $this->reservation_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }


    /**
     * @return Collection|Reservation[]
     */
    public function getReservationId(): Collection
    {
        return $this->reservation_id;
    }

    public function addReservationId(Reservation $reservationId): self
    {
        if (!$this->reservation_id->contains($reservationId)) {
            $this->reservation_id[] = $reservationId;
            $reservationId->addConducteur($this);
        }

        return $this;
    }

    public function removeReservationId(Reservation $reservationId): self
    {
        if ($this->reservation_id->contains($reservationId)) {
            $this->reservation_id->removeElement($reservationId);
            $reservationId->removeConducteur($this);
        }

        return $this;
    }
//    public function getConducteur(): ?Conducteur
//    {
//        return $this->conducteur;
//
//    }
}

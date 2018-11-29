<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NatureDeplacementRepository")
 */
class NatureDeplacement
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
    private $nature;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservation", mappedBy="nature")
     */
    private $nature_id;

    public function __construct()
    {
        $this->nature_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNatureDeplacement(): ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getNatureId(): Collection
    {
        return $this->nature_id;
    }

    public function addNatureId(Reservation $natureId): self
    {
        if (!$this->nature_id->contains($natureId)) {
            $this->nature_id[] = $natureId;
            $natureId->setNature($this);
        }

        return $this;
    }

    public function removeNatureId(Reservation $natureId): self
    {
        if ($this->nature_id->contains($natureId)) {
            $this->nature_id->removeElement($natureId);
            // set the owning side to null (unless already changed)
            if ($natureId->getNature() === $this) {
                $natureId->setNature(null);
            }
        }

        return $this;
    }
}

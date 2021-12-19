<?php

namespace App\Entity;

use App\Repository\EcoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EcoleRepository::class)
 */
class Ecole
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Athlete::class, mappedBy="ecole")
     */
    private $athlete;

    public function __construct()
    {
        $this->athlete = new ArrayCollection();
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
     * @return Collection|Athlete[]
     */
    public function getAthlete(): Collection
    {
        return $this->athlete;
    }

    public function addAthlete(Athlete $athlete): self
    {
        if (!$this->athlete->contains($athlete)) {
            $this->athlete[] = $athlete;
            $athlete->setEcole($this);
        }

        return $this;
    }

    public function removeAthlete(Athlete $athlete): self
    {
        if ($this->athlete->removeElement($athlete)) {
            // set the owning side to null (unless already changed)
            if ($athlete->getEcole() === $this) {
                $athlete->setEcole(null);
            }
        }

        return $this;
    }
}

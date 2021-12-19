<?php

namespace App\Entity;

use App\Repository\SexeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SexeRepository::class)
 */
class Sexe
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
     * @ORM\OneToMany(targetEntity=Athlete::class, mappedBy="sexe")
     */
    private $athlete;

    /**
     * @ORM\OneToMany(targetEntity=Entraineur::class, mappedBy="sexe")
     */
    private $entraineur;

    public function __construct()
    {
        $this->athlete = new ArrayCollection();
        $this->grade = new ArrayCollection();
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
            $athlete->setSexe($this);
        }

        return $this;
    }

    public function removeAthlete(Athlete $athlete): self
    {
        if ($this->athlete->removeElement($athlete)) {
            // set the owning side to null (unless already changed)
            if ($athlete->getSexe() === $this) {
                $athlete->setSexe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Entraineur[]
     */
    public function getGrade(): Collection
    {
        return $this->grade;
    }

    public function addGrade(Entraineur $grade): self
    {
        if (!$this->grade->contains($grade)) {
            $this->grade[] = $grade;
            $grade->setSexe($this);
        }

        return $this;
    }

    public function removeGrade(Entraineur $grade): self
    {
        if ($this->grade->removeElement($grade)) {
            // set the owning side to null (unless already changed)
            if ($grade->getSexe() === $this) {
                $grade->setSexe(null);
            }
        }

        return $this;
    }
}

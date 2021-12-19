<?php

namespace App\Entity;

use App\Repository\GradeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GradeRepository::class)
 */
class Grade
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
     * @ORM\ManyToOne(targetEntity=Couleur::class, inversedBy="grades")
     */
    private $couleur;

    /**
     * @ORM\OneToMany(targetEntity=Entraineur::class, mappedBy="grade")
     */
    private $entraineurs;

    public function __construct()
    {
        $this->entraineurs = new ArrayCollection();
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

    public function getCouleur(): ?Couleur
    {
        return $this->couleur;
    }

    public function setCouleur(?Couleur $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * @return Collection|Entraineur[]
     */
    public function getEntraineurs(): Collection
    {
        return $this->entraineurs;
    }

    public function addEntraineur(Entraineur $entraineur): self
    {
        if (!$this->entraineurs->contains($entraineur)) {
            $this->entraineurs[] = $entraineur;
            $entraineur->setGrade($this);
        }

        return $this;
    }

    public function removeEntraineur(Entraineur $entraineur): self
    {
        if ($this->entraineurs->removeElement($entraineur)) {
            // set the owning side to null (unless already changed)
            if ($entraineur->getGrade() === $this) {
                $entraineur->setGrade(null);
            }
        }

        return $this;
    }
}

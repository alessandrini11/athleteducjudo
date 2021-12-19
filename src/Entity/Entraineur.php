<?php

namespace App\Entity;

use App\Repository\EntraineurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EntraineurRepository::class)
 */
class Entraineur
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
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datanaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieunaissance;

    /**
     * @ORM\ManyToOne(targetEntity=Sexe::class, inversedBy="grade")
     */
    private $sexe;

    /**
     * @ORM\ManyToOne(targetEntity=Grade::class, inversedBy="entraineurs")
     */
    private $grade;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDatanaissance(): ?\DateTimeInterface
    {
        return $this->datanaissance;
    }

    public function setDatanaissance(\DateTimeInterface $datanaissance): self
    {
        $this->datanaissance = $datanaissance;

        return $this;
    }

    public function getLieunaissance(): ?string
    {
        return $this->lieunaissance;
    }

    public function setLieunaissance(string $lieunaissance): self
    {
        $this->lieunaissance = $lieunaissance;

        return $this;
    }

    public function getSexe(): ?Sexe
    {
        return $this->sexe;
    }

    public function setSexe(?Sexe $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getGrade(): ?Grade
    {
        return $this->grade;
    }

    public function setGrade(?Grade $grade): self
    {
        $this->grade = $grade;

        return $this;
    }
}

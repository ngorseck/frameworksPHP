<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaladieRepository")
 */
class Maladie
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
     * @ORM\Column(type="string", length=255)
     */
    private $periode;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Animal", inversedBy="maladies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $animal;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Symptome", mappedBy="maladie")
     */
    private $symptomes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Traitement", mappedBy="maladie")
     */
    private $traitements;

    public function __construct()
    {
        $this->symptomes = new ArrayCollection();
        $this->traitements = new ArrayCollection();
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

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(string $periode): self
    {
        $this->periode = $periode;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * @return Collection|Symptome[]
     */
    public function getSymptomes(): Collection
    {
        return $this->symptomes;
    }

    public function addSymptome(Symptome $symptome): self
    {
        if (!$this->symptomes->contains($symptome)) {
            $this->symptomes[] = $symptome;
            $symptome->setMaladie($this);
        }

        return $this;
    }

    public function removeSymptome(Symptome $symptome): self
    {
        if ($this->symptomes->contains($symptome)) {
            $this->symptomes->removeElement($symptome);
            // set the owning side to null (unless already changed)
            if ($symptome->getMaladie() === $this) {
                $symptome->setMaladie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Traitement[]
     */
    public function getTraitements(): Collection
    {
        return $this->traitements;
    }

    public function addTraitement(Traitement $traitement): self
    {
        if (!$this->traitements->contains($traitement)) {
            $this->traitements[] = $traitement;
            $traitement->setMaladie($this);
        }

        return $this;
    }

    public function removeTraitement(Traitement $traitement): self
    {
        if ($this->traitements->contains($traitement)) {
            $this->traitements->removeElement($traitement);
            // set the owning side to null (unless already changed)
            if ($traitement->getMaladie() === $this) {
                $traitement->setMaladie(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}

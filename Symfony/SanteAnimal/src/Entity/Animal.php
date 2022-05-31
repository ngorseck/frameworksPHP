<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnimalRepository")
 */
class Animal
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
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Pays", inversedBy="animaux")
     */
    private $pays;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Maladie", mappedBy="animal", orphanRemoval=true)
     */
    private $maladies;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Traitement", mappedBy="animal")
     */
    private $traitements;

    public function __construct()
    {
        $this->pays = new ArrayCollection();
        $this->maladies = new ArrayCollection();
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

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection|Pays[]
     */
    public function getPays(): Collection
    {
        return $this->pays;
    }

    public function addPays(Pays $pays): self
    {
        if (!$this->pays->contains($pays)) {
            $this->pays[] = $pays;
        }

        return $this;
    }

    public function removePays(Pays $pays): self
    {
        if ($this->pays->contains($pays)) {
            $this->pays->removeElement($pays);
        }

        return $this;
    }

    /**
     * @return Collection|Maladie[]
     */
    public function getMaladies(): Collection
    {
        return $this->maladies;
    }

    public function addMalady(Maladie $malady): self
    {
        if (!$this->maladies->contains($malady)) {
            $this->maladies[] = $malady;
            $malady->setAnimal($this);
        }

        return $this;
    }

    public function removeMalady(Maladie $malady): self
    {
        if ($this->maladies->contains($malady)) {
            $this->maladies->removeElement($malady);
            // set the owning side to null (unless already changed)
            if ($malady->getAnimal() === $this) {
                $malady->setAnimal(null);
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
            $traitement->setAnimal($this);
        }

        return $this;
    }

    public function removeTraitement(Traitement $traitement): self
    {
        if ($this->traitements->contains($traitement)) {
            $this->traitements->removeElement($traitement);
            // set the owning side to null (unless already changed)
            if ($traitement->getAnimal() === $this) {
                $traitement->setAnimal(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->nom;
    }
}

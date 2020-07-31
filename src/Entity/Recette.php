<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\RecetteRepository;
use App\Entity\TableRecetteIngredients;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=RecetteRepository::class)
 */
class Recette
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=160, nullable=true)
     */
    private $difficulte;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cuisson;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=160, nullable=true)
     */
    private $ingredientsRecette;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $instructions;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $categorie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbrePart;

    /**
     * @ORM\OneToMany(targetEntity=TableRecetteIngredients::class, mappedBy="recette", cascade={"persist"}, fetch="EAGER")
     */
    private $ingredient;

    public function __construct()
    {
        $this->ingredient = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDifficulte(): ?string
    {
        return $this->difficulte;
    }

    public function setDifficulte(?string $difficulte): self
    {
        $this->difficulte = $difficulte;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getCuisson(): ?int
    {
        return $this->cuisson;
    }

    public function setCuisson(?int $cuisson): self
    {
        $this->cuisson = $cuisson;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getIngredientsRecette(): ?string
    {
        return $this->ingredientsRecette;
    }

    public function setIngredientsRecette(?string $ingredientsRecette): self
    {
        $this->ingredientsRecette = $ingredientsRecette;

        return $this;
    }

    public function getInstructions(): ?string
    {
        return $this->instructions;
    }

    public function setInstructions(?string $instructions): self
    {
        $this->instructions = $instructions;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getNbrePart(): ?int
    {
        return $this->nbrePart;
    }

    public function setNbrePart(?int $nbrePart): self
    {
        $this->nbrePart = $nbrePart;

        return $this;
    }

    /**
     * @return Collection|TableRecetteIngredients[]
     */
    public function getIngredient(): Collection
    {
        return $this->ingredient;
    }

    public function addIngredient(TableRecetteIngredients $ingredient): self
    {
        if (!$this->ingredient->contains($ingredient)) {
            $this->ingredient[] = $ingredient;
            $ingredient->setRecette($this);
        }

        return $this;
    }

    public function removeIngredient(TableRecetteIngredients $ingredient): self
    {
        if ($this->ingredient->contains($ingredient)) {
            $this->ingredient->removeElement($ingredient);
            // set the owning side to null (unless already changed)
            if ($ingredient->getRecette() === $this) {
                $ingredient->setRecette(null);
            }
        }

        return $this;
    }

    public function removeTableRecetteIngredients(TableRecetteIngredients $tableRecetteIngredients)
    {
        $this->ingredient->removeElement($tableRecetteIngredients);
    }
    
}

<?php

namespace App\Entity;

use App\Repository\IngredientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IngredientRepository::class)
 */
class Ingredient
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $image;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $calories;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $unite;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $typeIngredient;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vegan;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $vegetarien;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $gluten;

    /**
     * @ORM\Column(type="string", length=160, nullable=true)
     */
    private $saison;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCalories(): ?int
    {
        return $this->calories;
    }

    public function setCalories(?int $calories): self
    {
        $this->calories = $calories;

        return $this;
    }

    public function getUnite(): ?string
    {
        return $this->unite;
    }

    public function setUnite(string $unite): self
    {
        $this->unite = $unite;

        return $this;
    }

    public function getTypeIngredient(): ?string
    {
        return $this->typeIngredient;
    }

    public function setTypeIngredient(string $typeIngredient): self
    {
        $this->typeIngredient = $typeIngredient;

        return $this;
    }

    public function getVegan(): ?bool
    {
        return $this->vegan;
    }

    public function setVegan(?bool $vegan): self
    {
        $this->vegan = $vegan;

        return $this;
    }

    public function getVegetarien(): ?bool
    {
        return $this->vegetarien;
    }

    public function setVegetarien(?bool $vegetarien): self
    {
        $this->vegetarien = $vegetarien;

        return $this;
    }

    public function getGluten(): ?bool
    {
        return $this->gluten;
    }

    public function setGluten(?bool $gluten): self
    {
        $this->gluten = $gluten;

        return $this;
    }

    public function getSaison(): ?string
    {
        return $this->saison;
    }

    public function setSaison(string $saison): self
    {
        $this->saison = $saison;

        return $this;
    }
}

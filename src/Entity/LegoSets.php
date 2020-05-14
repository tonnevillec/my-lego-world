<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LegoSetsRepository")
 */
class LegoSets
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $setID;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $numberVariant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $theme;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $themeGroup;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $category;

    /**
     * @ORM\Column(type="boolean")
     */
    private $released;

    /**
     * @ORM\Column(type="integer")
     */
    private $pieces;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thumbnailURL;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imageURL;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $rating;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $instructionsCount;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $additionalImageCount;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $EANCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastUpdated;

    /**
     * @ORM\Column(type="date")
     */
    private $scrapDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $minifigs;

    public function __construct()
    {
        $this->scrapDate = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSetID(): ?int
    {
        return $this->setID;
    }

    public function setSetID(int $setID): self
    {
        $this->setID = $setID;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getNumberVariant(): ?string
    {
        return $this->numberVariant;
    }

    public function setNumberVariant(?string $numberVariant): self
    {
        $this->numberVariant = $numberVariant;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getTheme(): ?string
    {
        return $this->theme;
    }

    public function setTheme(string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getThemeGroup(): ?string
    {
        return $this->themeGroup;
    }

    public function setThemeGroup(?string $themeGroup): self
    {
        $this->themeGroup = $themeGroup;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getReleased(): ?bool
    {
        return $this->released;
    }

    public function setReleased(bool $released): self
    {
        $this->released = $released;

        return $this;
    }

    public function getPieces(): ?int
    {
        return $this->pieces;
    }

    public function setPieces(int $pieces): self
    {
        $this->pieces = $pieces;

        return $this;
    }

    public function getThumbnailURL(): ?string
    {
        return $this->thumbnailURL;
    }

    public function setThumbnailURL(?string $thumbnailURL): self
    {
        $this->thumbnailURL = $thumbnailURL;

        return $this;
    }

    public function getImageURL(): ?string
    {
        return $this->imageURL;
    }

    public function setImageURL(?string $imageURL): self
    {
        $this->imageURL = $imageURL;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(?float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getInstructionsCount(): ?int
    {
        return $this->instructionsCount;
    }

    public function setInstructionsCount(?int $instructionsCount): self
    {
        $this->instructionsCount = $instructionsCount;

        return $this;
    }

    public function getAdditionalImageCount(): ?int
    {
        return $this->additionalImageCount;
    }

    public function setAdditionalImageCount(?int $additionalImageCount): self
    {
        $this->additionalImageCount = $additionalImageCount;

        return $this;
    }

    public function getEANCode(): ?string
    {
        return $this->EANCode;
    }

    public function setEANCode(?string $EANCode): self
    {
        $this->EANCode = $EANCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param mixed $lastUpdated
     */
    public function setLastUpdated($lastUpdated): void
    {
        $this->lastUpdated = $lastUpdated;
    }

    public function getScrapDate(): ?\DateTimeInterface
    {
        return $this->scrapDate;
    }

    public function setScrapDate(\DateTimeInterface $scrapDate): self
    {
        $this->scrapDate = $scrapDate;

        return $this;
    }

    public function getMinifigs(): ?int
    {
        return $this->minifigs;
    }

    public function setMinifigs(?int $minifigs): self
    {
        $this->minifigs = $minifigs;

        return $this;
    }
}

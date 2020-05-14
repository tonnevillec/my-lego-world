<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LegoThemesRepository")
 */
class LegoThemes
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
    private $theme;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $yearFrom;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $yearTo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isSubthemesScrap;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getYearFrom(): ?string
    {
        return $this->yearFrom;
    }

    public function setYearFrom(?string $yearFrom): self
    {
        $this->yearFrom = $yearFrom;

        return $this;
    }

    public function getYearTo(): ?string
    {
        return $this->yearTo;
    }

    public function setYearTo(?string $yearTo): self
    {
        $this->yearTo = $yearTo;

        return $this;
    }

    public function getIsSubthemesScrap(): ?bool
    {
        return $this->isSubthemesScrap;
    }

    public function setIsSubthemesScrap(?bool $isSubthemesScrap): self
    {
        $this->isSubthemesScrap = $isSubthemesScrap;

        return $this;
    }
}

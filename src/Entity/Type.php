<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
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
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=MovieSpec::class, mappedBy="type")
     */
    private $movieSpecs;

    /**
     * @ORM\ManyToMany(targetEntity=AlbumSpec::class, mappedBy="type")
     */
    private $albumSpecs;

    /**
     * @ORM\ManyToMany(targetEntity=BookSpec::class, mappedBy="type")
     */
    private $bookSpecs;

    /**
     * @ORM\ManyToMany(targetEntity=SerieSpec::class, mappedBy="type")
     */
    private $serieSpecs;

    public function __construct()
    {
        $this->movieSpecs = new ArrayCollection();
        $this->albumSpecs = new ArrayCollection();
        $this->bookSpecs = new ArrayCollection();
        $this->serieSpecs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
    //TODO: Créer relation manyToMany entre Type et les différentes spec

    /**
     * @return Collection|MovieSpec[]
     */
    public function getMovieSpecs(): Collection
    {
        return $this->movieSpecs;
    }

    public function addMovieSpec(MovieSpec $movieSpec): self
    {
        if (!$this->movieSpecs->contains($movieSpec)) {
            $this->movieSpecs[] = $movieSpec;
            $movieSpec->addType($this);
        }

        return $this;
    }

    public function removeMovieSpec(MovieSpec $movieSpec): self
    {
        if ($this->movieSpecs->contains($movieSpec)) {
            $this->movieSpecs->removeElement($movieSpec);
            $movieSpec->removeType($this);
        }

        return $this;
    }

    /**
     * @return Collection|AlbumSpec[]
     */
    public function getAlbumSpecs(): Collection
    {
        return $this->albumSpecs;
    }

    public function addAlbumSpec(AlbumSpec $albumSpec): self
    {
        if (!$this->albumSpecs->contains($albumSpec)) {
            $this->albumSpecs[] = $albumSpec;
            $albumSpec->addType($this);
        }

        return $this;
    }

    public function removeAlbumSpec(AlbumSpec $albumSpec): self
    {
        if ($this->albumSpecs->contains($albumSpec)) {
            $this->albumSpecs->removeElement($albumSpec);
            $albumSpec->removeType($this);
        }

        return $this;
    }

    /**
     * @return Collection|BookSpec[]
     */
    public function getBookSpecs(): Collection
    {
        return $this->bookSpecs;
    }

    public function addBookSpec(BookSpec $bookSpec): self
    {
        if (!$this->bookSpecs->contains($bookSpec)) {
            $this->bookSpecs[] = $bookSpec;
            $bookSpec->addType($this);
        }

        return $this;
    }

    public function removeBookSpec(BookSpec $bookSpec): self
    {
        if ($this->bookSpecs->contains($bookSpec)) {
            $this->bookSpecs->removeElement($bookSpec);
            $bookSpec->removeType($this);
        }

        return $this;
    }

    /**
     * @return Collection|SerieSpec[]
     */
    public function getSerieSpecs(): Collection
    {
        return $this->serieSpecs;
    }

    public function addSerieSpec(SerieSpec $serieSpec): self
    {
        if (!$this->serieSpecs->contains($serieSpec)) {
            $this->serieSpecs[] = $serieSpec;
            $serieSpec->addType($this);
        }

        return $this;
    }

    public function removeSerieSpec(SerieSpec $serieSpec): self
    {
        if ($this->serieSpecs->contains($serieSpec)) {
            $this->serieSpecs->removeElement($serieSpec);
            $serieSpec->removeType($this);
        }

        return $this;
    }
}

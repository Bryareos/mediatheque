<?php

namespace App\Entity;

use App\Repository\MovieSpecRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MovieSpecRepository::class)
 */
class MovieSpec
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @ORM\Column(type="json")
     */
    private $actors = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getActors(): ?array
    {
        return $this->actors;
    }

    public function setActors(array $actors): self
    {
        $this->actors = $actors;

        return $this;
    }
}

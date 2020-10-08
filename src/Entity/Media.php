<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MediaRepository::class)
 */
class Media
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
     * @ORM\Column(type="string", length=255)
     */
    private $author;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgSrc;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\OneToMany(targetEntity=BookingMedia::class, mappedBy="media_id", orphanRemoval=true)
     */
    private $bookingMedia;

    /**
     * @ORM\OneToOne(targetEntity=MovieSpec::class, cascade={"persist", "remove"})
     */
    private $movie_spec;

    /**
     * @ORM\OneToOne(targetEntity=SerieSpec::class, cascade={"persist", "remove"})
     */
    private $serie_spec;

    /**
     * @ORM\OneToOne(targetEntity=BookSpec::class, cascade={"persist", "remove"})
     */
    private $book_spec;

    /**
     * @ORM\OneToOne(targetEntity=AlbumSpec::class, cascade={"persist", "remove"})
     */
    private $album_spec;

    public function __construct()
    {
        $this->bookingMedia = new ArrayCollection();
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

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImgSrc(): ?string
    {
        return $this->imgSrc;
    }

    public function setImgSrc(string $imgSrc): self
    {
        $this->imgSrc = $imgSrc;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return Collection|BookingMedia[]
     */
    public function getBookingMedia(): Collection
    {
        return $this->bookingMedia;
    }

    public function addBookingMedium(BookingMedia $bookingMedium): self
    {
        if (!$this->bookingMedia->contains($bookingMedium)) {
            $this->bookingMedia[] = $bookingMedium;
            $bookingMedium->setMediaId($this);
        }

        return $this;
    }

    public function removeBookingMedium(BookingMedia $bookingMedium): self
    {
        if ($this->bookingMedia->contains($bookingMedium)) {
            $this->bookingMedia->removeElement($bookingMedium);
            // set the owning side to null (unless already changed)
            if ($bookingMedium->getMediaId() === $this) {
                $bookingMedium->setMediaId(null);
            }
        }

        return $this;
    }

    public function getMovieSpec(): ?MovieSpec
    {
        return $this->movie_spec;
    }

    public function setMovieSpec(?MovieSpec $movie_spec): self
    {
        $this->movie_spec = $movie_spec;

        return $this;
    }

    public function getSerieSpec(): ?SerieSpec
    {
        return $this->serie_spec;
    }

    public function setSerieSpec(?SerieSpec $serie_spec): self
    {
        $this->serie_spec = $serie_spec;

        return $this;
    }

    public function getBookSpec(): ?BookSpec
    {
        return $this->book_spec;
    }

    public function setBookSpec(?BookSpec $book_spec): self
    {
        $this->book_spec = $book_spec;

        return $this;
    }

    public function getAlbumSpec(): ?AlbumSpec
    {
        return $this->album_spec;
    }

    public function setAlbumSpec(?AlbumSpec $album_spec): self
    {
        $this->album_spec = $album_spec;

        return $this;
    }
}

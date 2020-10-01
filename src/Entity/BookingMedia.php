<?php

namespace App\Entity;

use App\Repository\BookingMediaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingMediaRepository::class)
 */
class BookingMedia
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Media::class, inversedBy="bookingMedia")
     * @ORM\JoinColumn(nullable=false)
     */
    private $media_id;

    /**
     * @ORM\ManyToOne(targetEntity=Booking::class, inversedBy="bookingMedia")
     * @ORM\JoinColumn(nullable=false)
     */
    private $booking_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endAt;

    public function __construct()
    {
        if (is_null($this->getStartAt())) {
            $this->startAt = new \DateTime('now', new \DateTimeZone('Europe/Paris'));
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMediaId(): ?Media
    {
        return $this->media_id;
    }

    public function setMediaId(?Media $media_id): self
    {
        $this->media_id = $media_id;

        return $this;
    }

    public function getBookingId(): ?Booking
    {
        return $this->booking_id;
    }

    public function setBookingId(?Booking $booking_id): self
    {
        $this->booking_id = $booking_id;

        return $this;
    }

    public function getStartAt()
    {
        return $this->startAt;
    }

    public function setStartAt($startAt): void
    {
        $this->startAt = $startAt;
    }

    public function getEndAt()
    {
        return $this->endAt;
    }

    public function setEndAt($endAt): void
    {
        $this->endAt = $endAt;
    }
}

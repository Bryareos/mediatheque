<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\OneToMany(targetEntity=BookingMedia::class, mappedBy="booking_id", orphanRemoval=true)
     */
    private $bookingMedia;

    public function __construct()
    {
        $this->bookingMedia = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

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
            $bookingMedium->setBookingId($this);
        }

        return $this;
    }

    public function removeBookingMedium(BookingMedia $bookingMedium): self
    {
        if ($this->bookingMedia->contains($bookingMedium)) {
            $this->bookingMedia->removeElement($bookingMedium);
            // set the owning side to null (unless already changed)
            if ($bookingMedium->getBookingId() === $this) {
                $bookingMedium->setBookingId(null);
            }
        }

        return $this;
    }
}

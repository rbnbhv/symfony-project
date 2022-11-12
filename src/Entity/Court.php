<?php

namespace App\Entity;

use App\Repository\CourtRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourtRepository::class)]
class Court
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $courtNumber = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCourtNumber(): ?string
    {
        return $this->courtNumber;
    }

    public function setCourtNumber(string $courtNumber): self
    {
        $this->courtNumber = $courtNumber;

        return $this;
    }
}

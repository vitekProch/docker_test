<?php

namespace App\Entity;

use App\Repository\SpecialOfferRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: SpecialOfferRepository::class)]
class SpecialOffer
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $specialOfferImage = null;

    #[ORM\Column(length: 255)]
    private ?string $specialOfferName = null;

    #[ORM\Column]
    private ?bool $specialOfferShow = false;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialOfferImage(): ?string
    {
        return $this->specialOfferImage;
    }

    public function setSpecialOfferImage(string $specialOfferImage): static
    {
        $this->specialOfferImage = $specialOfferImage;

        return $this;
    }

    public function getSpecialOfferName(): ?string
    {
        return $this->specialOfferName;
    }

    public function setSpecialOfferName(string $specialOfferName): static
    {
        $this->specialOfferName = $specialOfferName;

        return $this;
    }

    public function isSpecialOfferShow(): ?bool
    {
        return $this->specialOfferShow;
    }

    public function setSpecialOfferShow(bool $specialOfferShow): static
    {
        $this->specialOfferShow = $specialOfferShow;

        return $this;
    }
}

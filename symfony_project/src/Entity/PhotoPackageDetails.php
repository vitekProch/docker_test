<?php

namespace App\Entity;

use App\Repository\PhotoPackageDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoPackageDetailsRepository::class)]
class PhotoPackageDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $PhotoPackageDetailTitle = null;

    #[ORM\Column]
    private ?int $PhotoPackageDetailPhotoAmount = null;

    #[ORM\Column]
    private ?int $PhotoPackageDetailPrice = null;

    #[ORM\ManyToOne(inversedBy: 'photoPackageDetails')]
    private ?PhotoPackageNames $PhotoPackageName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotoPackageDetailTitle(): ?string
    {
        return $this->PhotoPackageDetailTitle;
    }

    public function setPhotoPackageDetailTitle(string $PhotoPackageDetailTitle): static
    {
        $this->PhotoPackageDetailTitle = $PhotoPackageDetailTitle;

        return $this;
    }

    public function getPhotoPackageDetailPhotoAmount(): ?int
    {
        return $this->PhotoPackageDetailPhotoAmount;
    }

    public function setPhotoPackageDetailPhotoAmount(int $PhotoPackageDetailPhotoAmount): static
    {
        $this->PhotoPackageDetailPhotoAmount = $PhotoPackageDetailPhotoAmount;

        return $this;
    }

    public function getPhotoPackageDetailPrice(): ?int
    {
        return $this->PhotoPackageDetailPrice;
    }

    public function setPhotoPackageDetailPrice(int $PhotoPackageDetailPrice): static
    {
        $this->PhotoPackageDetailPrice = $PhotoPackageDetailPrice;

        return $this;
    }

    public function getPhotoPackageName(): ?PhotoPackageNames
    {
        return $this->PhotoPackageName;
    }

    public function setPhotoPackageName(?PhotoPackageNames $PhotoPackageName): static
    {
        $this->PhotoPackageName = $PhotoPackageName;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getPhotoPackageDetailTitle();
    }
}

<?php

namespace App\Entity;

use App\Repository\PortfolioPhotosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortfolioPhotosRepository::class)]
class PortfolioPhotos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $portfolioPhotoName = null;

    #[ORM\Column(length: 255)]
    private ?string $portfolioAlt = null;

    #[ORM\ManyToOne(inversedBy: 'portfolioPhoto')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PhotoCategories $photoCategory = null;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPortfolioPhotoName(): ?string
    {
        return $this->portfolioPhotoName;
    }

    public function setPortfolioPhotoName(string $portfolioPhotoName): static
    {
        $this->portfolioPhotoName = $portfolioPhotoName;
        return $this;
    }
    public function setPortfolioPathFile($reviewAlt): static
    {
        return $this->setPortfolioPhotoName($reviewAlt[0]);
    }

    public function getPortfolioPathFile(): ?string
    {
        return $this->getPortfolioPhotoName();
    }

    public function getPortfolioAlt(): ?string
    {
        return $this->portfolioAlt;
    }

    public function setPortfolioAlt(string $portfolioAlt): static
    {
        $this->portfolioAlt = $portfolioAlt;

        return $this;
    }

    public function getPhotoCategory(): ?PhotoCategories
    {
        return $this->photoCategory;
    }

    public function getPhotoCategoryName(): string
    {
        return $this->getPhotoCategory()->getCategoryName();
    }

    public function setPhotoCategory(?PhotoCategories $photoCategory): static
    {
        $this->photoCategory = $photoCategory;

        return $this;
    }

    public function getPortfolioPhotoPath(): ?string
    {
        return '/uploads/portfolioPhoto/' . $this->portfolioPhotoName;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}

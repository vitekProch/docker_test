<?php

namespace App\Entity;

use App\Repository\PeopleReviewsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PeopleReviewsRepository::class)]
class PeopleReviews
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $reviewPhotoName = null;

    #[ORM\Column(length: 255)]
    private ?string $reviewAlt = null;

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

    public function getReviewPhotoName(): ?string
    {
        return $this->reviewPhotoName;
    }

    public function setReviewPhotoName(string $reviewPhotoName): static
    {
        $this->reviewPhotoName = $reviewPhotoName;

        return $this;
    }

    public function getReviewAlt(): ?string
    {
        return $this->reviewAlt;
    }

    public function setReviewAlt(string $reviewAlt): static
    {
        $this->reviewAlt = $reviewAlt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setReviewPathFile($reviewAlt): static
    {
        return $this->setReviewPhotoName($reviewAlt[0]);
    }

    public function getReviewPathFile(): ?string
    {
        return $this->getReviewPhotoName();
    }

    public function getReviewPhotoPath(): ?string
    {
        return '/uploads/reviews/' . $this->reviewPhotoName;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\PhotoCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: PhotoCategoriesRepository::class)]
class PhotoCategories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $categoryName = null;

    #[ORM\Column(length: 255)]
    private ?string $categoryPhotoName = null;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    #[ORM\OneToMany(mappedBy: 'photoCategory', targetEntity: PortfolioPhotos::class)]
    private Collection $portfolioPhotos;

    #[ORM\Column(length: 255)]
    private ?string $fontAwesomeIcon = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Gedmo\Slug(fields: ['categoryName'])]
    private ?string $slug = null;



    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->portfolioPhotos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategoryName(): ?string
    {
        return $this->categoryName;
    }

    public function setCategoryName(string $categoryName): static
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    public function getCategoryPhotoName(): ?string
    {
        return $this->categoryPhotoName;
    }
    public function getCategoryPhotoPath(): ?string
    {
        return '/uploads/categories/' . $this->categoryPhotoName;
    }
    public function setCategoryPhotoName(string $categoryPhotoName): static
    {
        $this->categoryPhotoName = $categoryPhotoName;
        return $this;
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

    /**
     * @return Collection<int, PortfolioPhotos>
     */
    public function getPortfolioPhotos(): Collection
    {
        return $this->portfolioPhotos;
    }

    public function addPortfolioPhoto(PortfolioPhotos $portfolioPhoto): static
    {
        if (!$this->portfolioPhotos->contains($portfolioPhoto)) {
            $this->portfolioPhotos->add($portfolioPhoto);
            $portfolioPhoto->setPhotoCategory($this);
        }

        return $this;
    }

    public function removePortfolioPhoto(PortfolioPhotos $portfolioPhoto): static
    {
        if ($this->portfolioPhotos->removeElement($portfolioPhoto)) {
            // set the owning side to null (unless already changed)
            if ($portfolioPhoto->getPhotoCategory() === $this) {
                $portfolioPhoto->setPhotoCategory(null);
            }
        }

        return $this;
    }

    public function getFontAwesomeIcon(): ?string
    {
        return $this->fontAwesomeIcon;
    }

    public function setFontAwesomeIcon(string $fontAwesomeIcon): static
    {
        $this->fontAwesomeIcon = $fontAwesomeIcon;

        return $this;
    }
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    public function setSlug($slug): static
    {
        $this->slug = $slug;

        return $this;
    }
}

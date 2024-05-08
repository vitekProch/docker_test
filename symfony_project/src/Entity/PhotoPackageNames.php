<?php

namespace App\Entity;

use App\Repository\PhotoPackageNamesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoPackageNamesRepository::class)]
class PhotoPackageNames
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $PhotoPackageTitle = null;

    #[ORM\OneToMany(mappedBy: 'PhotoPackageName', targetEntity: PhotoPackageDetails::class, cascade: ["persist"])]
    private Collection $photoPackageDetails;

    public function __construct()
    {
        $this->photoPackageDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotoPackageTitle(): ?string
    {
        return $this->PhotoPackageTitle;
    }

    public function setPhotoPackageTitle(string $PhotoPackageTitle): static
    {
        $this->PhotoPackageTitle = $PhotoPackageTitle;

        return $this;
    }

    /**
     * @return Collection<int, PhotoPackageDetails>
     */
    public function getPhotoPackageDetails(): Collection
    {
        return $this->photoPackageDetails;
    }

    public function addPhotoPackageDetail(PhotoPackageDetails $photoPackageDetail): static
    {
        if (!$this->photoPackageDetails->contains($photoPackageDetail)) {
            $this->photoPackageDetails->add($photoPackageDetail);
            $photoPackageDetail->setPhotoPackageName($this);
        }

        return $this;
    }

    public function removePhotoPackageDetail(PhotoPackageDetails $photoPackageDetail): static
    {
        if ($this->photoPackageDetails->removeElement($photoPackageDetail)) {
            // set the owning side to null (unless already changed)
            if ($photoPackageDetail->getPhotoPackageName() === $this) {
                $photoPackageDetail->setPhotoPackageName(null);
            }
        }

        return $this;
    }
}

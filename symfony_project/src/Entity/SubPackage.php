<?php

namespace App\Entity;

use App\Repository\SubPackageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubPackageRepository::class)]
class SubPackage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\ManyToMany(targetEntity: PackageItem::class, inversedBy: 'subPackages', cascade: ["persist"])]
    private Collection $items;

    #[ORM\ManyToOne(inversedBy: 'subPackages')]
    private ?WeddingPackage $weddingPackage = null;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, PackageItem>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(PackageItem $item): static
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
        }

        return $this;
    }

    public function removeItem(PackageItem $item): static
    {
        $this->items->removeElement($item);

        return $this;
    }

    public function getWeddingPackage(): ?WeddingPackage
    {
        return $this->weddingPackage;
    }

    public function setWeddingPackage(?WeddingPackage $weddingPackage): static
    {
        $this->weddingPackage = $weddingPackage;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }


}

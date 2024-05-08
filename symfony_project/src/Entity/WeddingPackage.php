<?php 

namespace App\Entity;

use App\Repository\WeddingPackageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeddingPackageRepository::class)]
class WeddingPackage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'weddingPackage', targetEntity: SubPackage::class, cascade: ["persist"])]
    private Collection $weddingPackage;

    #[ORM\OneToMany(mappedBy: 'weddingPackage', targetEntity: SubPackage::class, cascade: ["remove", "persist"])]
    private Collection $subPackages;

    public function __construct()
    {
        $this->weddingPackage = new ArrayCollection();
        $this->subPackages = new ArrayCollection();
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

    /**
     * @return Collection<int, SubPackage>
     */
    public function getWeddingPackage(): Collection
    {
        return $this->weddingPackage;
    }

    public function addWeddingPackage(SubPackage $weddingPackage): static
    {
        if (!$this->weddingPackage->contains($weddingPackage)) {
            $this->weddingPackage->add($weddingPackage);
            $weddingPackage->setWeddingPackage($this);
        }

        return $this;
    }

    public function removeWeddingPackage(SubPackage $weddingPackage): static
    {
        if ($this->weddingPackage->removeElement($weddingPackage)) {
            // set the owning side to null (unless already changed)
            if ($weddingPackage->getWeddingPackage() === $this) {
                $weddingPackage->setWeddingPackage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SubPackage>
     */
    public function getSubPackages(): Collection
    {
        return $this->subPackages;
    }

    public function addSubPackage(SubPackage $subPackage): static
    {
        if (!$this->subPackages->contains($subPackage)) {
            $this->subPackages->add($subPackage);
            $subPackage->setWeddingPackage($this);
        }

        return $this;
    }

    public function removeSubPackage(SubPackage $subPackage): static
    {
        if ($this->subPackages->removeElement($subPackage)) {
            // set the owning side to null (unless already changed)
            if ($subPackage->getWeddingPackage() === $this) {
                $subPackage->setWeddingPackage(null);
            }
        }

        return $this;
    }

}

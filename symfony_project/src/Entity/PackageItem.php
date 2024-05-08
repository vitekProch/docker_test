<?php 
namespace App\Entity;

use App\Repository\PackageItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PackageItemRepository::class)]
class PackageItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: SubPackage::class, mappedBy: 'items', cascade: ["persist"])]
    private Collection $subPackages;

    public function __construct()
    {
        $this->subPackages = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
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
            $subPackage->addItem($this);
        }

        return $this;
    }

    public function removeSubPackage(SubPackage $subPackage): static
    {
        if ($this->subPackages->removeElement($subPackage)) {
            $subPackage->removeItem($this);
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->name;
    }
}

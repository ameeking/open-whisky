<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\WhiskyRepository")
 */
class Whisky
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @ApiFilter(SearchFilter::class, strategy="ipartial")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="float")
     */
    private $abv;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Distillery", inversedBy="Whiskies")
     * @ORM\JoinColumn(nullable=false)
     */
    private $distillery;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tasting", mappedBy="whisky", orphanRemoval=true)
     */
    private $tastings;

    public function __construct()
    {
        $this->tastings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getAbv(): ?float
    {
        return $this->abv;
    }

    public function setAbv(float $abv): self
    {
        $this->abv = $abv;

        return $this;
    }

    public function getDistillery(): ?Distillery
    {
        return $this->distillery;
    }

    public function setDistillery(?Distillery $distillery): self
    {
        $this->distillery = $distillery;

        return $this;
    }

    /**
     * @return Collection|Tasting[]
     */
    public function getTastings(): Collection
    {
        return $this->tastings;
    }

    public function addTasting(Tasting $tasting): self
    {
        if (!$this->tastings->contains($tasting)) {
            $this->tastings[] = $tasting;
            $tasting->setWhisky($this);
        }

        return $this;
    }

    public function removeTasting(Tasting $tasting): self
    {
        if ($this->tastings->contains($tasting)) {
            $this->tastings->removeElement($tasting);
            // set the owning side to null (unless already changed)
            if ($tasting->getWhisky() === $this) {
                $tasting->setWhisky(null);
            }
        }

        return $this;
    }
}

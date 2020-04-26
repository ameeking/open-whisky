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
 * @ORM\Entity(repositoryClass="App\Repository\DistilleryRepository")
 */
class Distillery
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
     * @ApiFilter(SearchFilter::class, strategy="ipartial")
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     * @ApiFilter(SearchFilter::class, strategy="ipartial")
     */
    private $region;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Whisky", mappedBy="distillery", orphanRemoval=true)
     */
    private $whiskies;

    public function __construct()
    {
        $this->whiskies = new ArrayCollection();
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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return Collection|Whisky[]
     */
    public function getWhiskies(): Collection
    {
        return $this->whiskies;
    }

    public function addWhisky(Whisky $whisky): self
    {
        if (!$this->whiskies->contains($whisky)) {
            $this->whiskies[] = $whisky;
            $whisky->setDistillery($this);
        }

        return $this;
    }

    public function removeWhisky(Whisky $whisky): self
    {
        if ($this->whiskies->contains($whisky)) {
            $this->whiskies->removeElement($whisky);
            // set the owning side to null (unless already changed)
            if ($whisky->getDistillery() === $this) {
                $whisky->setDistillery(null);
            }
        }

        return $this;
    }
}

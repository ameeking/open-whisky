<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ReviewRepository")
 */
class Review
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Whisky", inversedBy="reviews")
     * @ORM\JoinColumn(nullable=false)
     */
    private $whisky;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $glance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $colour;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $nose = [];

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $taste = [];

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $finish;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rating;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Member", inversedBy="reviews")
     * @ORM\JoinColumn(nullable=false)
     */
    private $member;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWhisky(): ?Whisky
    {
        return $this->whisky;
    }

    public function setWhisky(?Whisky $whisky): self
    {
        $this->whisky = $whisky;

        return $this;
    }

    public function getGlance(): ?string
    {
        return $this->glance;
    }

    public function setGlance(?string $glance): self
    {
        $this->glance = $glance;

        return $this;
    }

    public function getColour(): ?string
    {
        return $this->colour;
    }

    public function setColour(?string $colour): self
    {
        $this->colour = $colour;

        return $this;
    }

    public function getNose(): ?string
    {
        return $this->nose;
    }

    public function setNose(?string $nose): self
    {
        $this->nose = $nose;

        return $this;
    }

    public function getTaste(): ?string
    {
        return $this->taste;
    }

    public function setTaste(?string $taste): self
    {
        $this->taste = $taste;

        return $this;
    }

    public function getFinish(): ?string
    {
        return $this->finish;
    }

    public function setFinish(?string $finish): self
    {
        $this->finish = $finish;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getMember(): ?Member
    {
        return $this->member;
    }

    public function setMember(?Member $member): self
    {
        $this->member = $member;

        return $this;
    }
}

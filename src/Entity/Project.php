<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'array')]
    private $goals = [];

    #[ORM\Column(type: 'array')]
    private $links = [];

    #[ORM\Column(type: 'boolean')]
    private $isFeatured;

    #[ORM\ManyToMany(targetEntity: Logo::class, inversedBy: 'projects')]
    private $logos;

    public function __construct()
    {
        $this->logos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getGoals(): ?array
    {
        return $this->goals;
    }

    public function setGoals(array $goals): self
    {
        $this->goals = $goals;

        return $this;
    }

    public function getLinks(): ?array
    {
        return $this->links;
    }

    public function setLinks(array $links): self
    {
        $this->links = $links;

        return $this;
    }

    public function getIsFeatured(): ?bool
    {
        return $this->isFeatured;
    }

    public function setIsFeatured(bool $isFeatured): self
    {
        $this->isFeatured = $isFeatured;

        return $this;
    }

    /**
     * @return Collection<int, Logo>
     */
    public function getLogos(): Collection
    {
        return $this->logos;
    }

    public function addLogo(Logo $logo): self
    {
        if (!$this->logos->contains($logo)) {
            $this->logos[] = $logo;
        }

        return $this;
    }

    public function removeLogo(Logo $logo): self
    {
        $this->logos->removeElement($logo);

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\LogoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogoRepository::class)]
class Logo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $svg;

    #[ORM\ManyToOne(targetEntity: Featured::class, inversedBy: 'logos')]
    private $featured;

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

    public function getSvg(): ?string
    {
        return $this->svg;
    }

    public function setSvg(string $svg): self
    {
        $this->svg = $svg;

        return $this;
    }

    public function getFeatured(): ?Featured
    {
        return $this->featured;
    }

    public function setFeatured(?Featured $featured): self
    {
        $this->featured = $featured;

        return $this;
    }
}

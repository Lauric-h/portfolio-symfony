<?php

namespace App\Entity;

use App\Repository\FeaturedRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: FeaturedRepository::class)]
/**
 * @Vich\Uploadable
 */
class Featured
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'text')]
    private $body;

    #[ORM\OneToMany(mappedBy: 'featured', targetEntity: Logo::class)]
    private $logos;

    #[ORM\Column(type: 'string', length: 255)]
    private $image = null;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="images", fileNameProperty="image")
     *
     * @var File|null
     */
    private ?File $imageFile = null;

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

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

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
            $logo->setFeatured($this);
        }

        return $this;
    }

    public function removeLogo(Logo $logo): self
    {
        if ($this->logos->removeElement($logo)) {
            // set the owning side to null (unless already changed)
            if ($logo->getFeatured() === $this) {
                $logo->setFeatured(null);
            }
        }

        return $this;
    }

    /**
     * @return ?string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param ?string $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @param File|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
}

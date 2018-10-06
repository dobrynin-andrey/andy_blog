<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datePublish;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $active;

//    /**
//     * @ORM\Column(type="integer", nullable=true)
//     */
//    private $views;
//
    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $anons;

//    /**
//     * @ORM\Column(type="integer", nullable=true)
//     */
//    private $anonsPicture;
//
    /**
     * @ORM\Column(type="text")
     */
    private $body;

//    /**
//     * @ORM\Column(type="integer")
//     */
//    private $detailPicture;

    public function __construct()
    {
        $this->setDateCreate(new \DateTime());
    }

    public function getId()
    {
        return $this->id;
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->dateCreate;
    }

    public function setDateCreate(\DateTimeInterface $dateCreate): self
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    public function getDatePublish()
    {
        return $this->datePublish;
    }

    public function setDatePublish($datePublish): void
    {
        $this->datePublish = $datePublish;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): self
    {
        $this->active = $active;

        return $this;
    }

//    public function getViews(): ?int
//    {
//        return $this->views;
//    }
//
//    public function setViews(?int $views): self
//    {
//        $this->views = $views;
//
//        return $this;
//    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getAnons(): ?string
    {
        return $this->anons;
    }

    public function setAnons(?string $anons): self
    {
        $this->anons = $anons;

        return $this;
    }
//
//    public function getAnonsPicture(): ?int
//    {
//        return $this->anonsPicture;
//    }
//
//    public function setAnonsPicture(?int $anonsPicture): self
//    {
//        $this->anonsPicture = $anonsPicture;
//
//        return $this;
//    }
//
    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }
//
//    public function getDetailPicture(): ?int
//    {
//        return $this->detailPicture;
//    }
//
//    public function setDetailPicture(int $detailPicture): self
//    {
//        $this->detailPicture = $detailPicture;
//
//        return $this;
//    }
}

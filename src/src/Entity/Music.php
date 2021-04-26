<?php

namespace App\Entity;

use App\Repository\MusicRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=MusicRepository::class)
 */
class Music
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 1,
     *      max = 250,
     *      minMessage = "the Music name must be at least {{ limit }} characters long",
     *      maxMessage = "the Music name cannot be longer than {{ limit }} characters"
     * )

     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 1,
     *      max = 250,
     *      minMessage = "the Music urlImg must be at least {{ limit }} characters long",
     *      maxMessage = "the Music urlImg cannot be longer than {{ limit }} characters"
     * )

     */
    private $urlImg;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 1,
     *      max = 250,
     *      minMessage = "the Music urlSong must be at least {{ limit }} characters long",
     *      maxMessage = "the Music urlSong cannot be longer than {{ limit }} characters"
     * )

     */
    private $urlSong;

    /**
     * @ORM\Column(type="float")
     * 
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 1,
     *      max = 300,
     *      notInRangeMessage = "lenght must be between {{ min }} and {{ max }} minutes",
     * )
     */
    private $lenght;


    /* ALBUM */


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

    public function getUrlImg(): ?string
    {
        return $this->urlImg;
    }

    public function setUrlImg(string $urlImg): self
    {
        $this->urlImg = $urlImg;

        return $this;
    }

    public function getUrlSong(): ?string
    {
        return $this->urlSong;
    }

    public function setUrlSong(string $urlSong): self
    {
        $this->urlSong = $urlSong;

        return $this;
    }

    public function getLenght(): ?float
    {
        return $this->lenght;
    }

    public function setLenght(float $lenght): self
    {
        $this->lenght = $lenght;

        return $this;
    }
}

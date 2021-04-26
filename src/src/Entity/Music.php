<?php

namespace App\Entity;

use App\Repository\MusicRepository;
use Doctrine\ORM\Mapping as ORM;

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

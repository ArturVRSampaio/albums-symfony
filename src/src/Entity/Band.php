<?php

namespace App\Entity;

use App\Repository\BandRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BandRepository::class)
 */
class Band
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
     *      minMessage = "the Band name must be at least {{ limit }} characters long",
     *      maxMessage = "the Band name cannot be longer than {{ limit }} characters"
     * )
     */
    private $name;

    /* ALBUNS */

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
}

<?php
namespace App\Entity;
use App\Repository\AlbumRepository; 
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlbumRepository::class)
 * @ORM\Table(name="Album")
 */
class Album
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private string $id;
    /** @ORM\Column(type="string") */
    private string $band;
    /** @ORM\Column(type="string") */
    private string $name;
    /** @ORM\Column(type="string") */
    private string $imgUrl;
    /** @ORM\Column(type="integer") */
    private int $qtdMusics;
    /** @ORM\Column(type="integer") */
    private float $playTime;

    /**
     * Album constructor.
     * @param string $band
     * @param string $name
     * @param string $imgUrl
     * @param int $qtdMusics
     * @param float $playTime
     */
    public function __construct(string $band, string $name, string $imgUrl, int $qtdMusics, int $playTime)
    {
        $this->band = $band;
        $this->name = $name;
        $this->imgUrl = $imgUrl;
        $this->qtdMusics = $qtdMusics;
        $this->playTime = $playTime;
    }

    
     
	/**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setID(string $id): void
    {
        $this->i = $id;
    }
     
	/**
     * @return string
     */
    public function getImgUrl(): string
    {
        return $this->imgUrl;
    }

    /**
     * @param string $imgUrl
     */
    public function setImgUrl(string $imgUrl): void
    {
        $this->imgUrl = $imgUrl;
    }

	/**
     * @return string
     */
    public function getBand(): string
    {
        return $this->band;
    }

    /**
     * @param string $band
     */
    public function setBand(string $band): void
    {
        $this->band = $band;
    }

	/**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getQtdMusics(): int
    {
        return $this->qtdMusics;
    }

    /**
     * @param int $qtdMusics
     */
    public function setQtdMusics(int $qtdMusics): void
    {
        $this->qtdMusics = $qtdMusics;
    }

    /**
     * @return float
     */
    public function getPlayTime(): float
    {
        return $this->playTime;
    }

    /**
     * @param float $playTime
     */
    public function setPlayTime(float $playTime): void
    {
        $this->playTime = $playTime;
    }


}
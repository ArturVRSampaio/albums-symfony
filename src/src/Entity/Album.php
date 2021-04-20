<?php


namespace App\Entity;


class Album
{
    private string $name;
    private int $qtdMusics;
    private float $playTime;

    /**
     * Livro constructor.
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
    public function getimUrl(): string
    {
        return $this->imUrl;
    }

    /**
     * @param string $band
     */
    public function setimUrl(string $imUrl): void
    {
        $this->imUrl = $imUrl;
    }

	/**
     * @return string
     */
    public function getband(): string
    {
        return $this->band;
    }

    /**
     * @param string $band
     */
    public function setband(string $band): void
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
    public function getplayTime(): float
    {
        return $this->playTime;
    }

    /**
     * @param float $playTime
     */
    public function setplayTime(float $playTime): void
    {
        $this->playTime = $playTime;
    }


}
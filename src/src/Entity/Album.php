<?php


namespace App\Entity;


class Album
{
    private string $nome;
    private int $qtdMusicas;
    private float $tempoTotal;

    /**
     * Livro constructor.
     * @param string $nome
     * @param int $qtdMusicas
     * @param float $tempoTotal
     */
    public function __construct(string $banda, string $nome, int $qtdMusicas, int $tempoTotal)
    {
        $this->banda = $banda;
        $this->nome = $nome;
        $this->qtdMusicas = $qtdMusicas;
        $this->tempoTotal = $tempoTotal;
    }

    
	/**
     * @return string
     */
    public function getBanda(): string
    {
        return $this->banda;
    }

    /**
     * @param string $banda
     */
    public function setBanda(string $banda): void
    {
        $this->banda = $banda;
    }

	/**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return int
     */
    public function getQtdMusicas(): int
    {
        return $this->qtdMusicas;
    }

    /**
     * @param int $qtdMusicas
     */
    public function setQtdMusicas(int $qtdMusicas): void
    {
        $this->qtdMusicas = $qtdMusicas;
    }

    /**
     * @return float
     */
    public function gettempoTotal(): float
    {
        return $this->tempoTotal;
    }

    /**
     * @param float $tempoTotal
     */
    public function settempoTotal(float $tempoTotal): void
    {
        $this->tempoTotal = $tempoTotal;
    }


}
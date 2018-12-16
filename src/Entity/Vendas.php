<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VendasRepository")
 */
class Vendas
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dataEmissao;

    /**
     * @ORM\Column(type="float")
     */
    private $valor;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantidade;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2, nullable=true)
     */
    private $desconto;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $comissao;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataEmissao(): ?\DateTimeInterface
    {
        return $this->dataEmissao;
    }

    public function setDataEmissao(\DateTimeInterface $dataEmissao): self
    {
        $this->dataEmissao = $dataEmissao;

        return $this;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getQuantidade(): ?int
    {
        return $this->quantidade;
    }

    public function setQuantidade(int $quantidade): self
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    public function getDesconto()
    {
        return $this->desconto;
    }

    public function setDesconto($desconto): self
    {
        $this->desconto = $desconto;

        return $this;
    }

    public function getComissao(): ?float
    {
        return $this->comissao;
    }

    public function setComissao(?float $comissao): self
    {
        $this->comissao = $comissao;

        return $this;
    }
}

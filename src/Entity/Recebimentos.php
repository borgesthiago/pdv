<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RecebimentosRepository")
 */
class Recebimentos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $valor;

    /**
     * @ORM\Column(type="date")
     */
    private $data_recebido;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Vendas", inversedBy="recebimentos", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $vendas;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getDataRecebido(): ?\DateTimeInterface
    {
        return $this->data_recebido;
    }

    public function setDataRecebido(\DateTimeInterface $data_recebido): self
    {
        $this->data_recebido = $data_recebido;

        return $this;
    }

    public function getVendas(): ?Vendas
    {
        return $this->vendas;
    }

    public function setVendas(Vendas $vendas): self
    {
        $this->vendas = $vendas;

        return $this;
    }

}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TipoVendaRepository")
 */
class TipoVenda
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $descricao;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Vendas", mappedBy="tipo_venda", cascade={"persist", "remove"})
     */
    private $vendas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getVendas(): ?Vendas
    {
        return $this->vendas;
    }

    public function setVendas(Vendas $vendas): self
    {
        $this->vendas = $vendas;

        // set the owning side of the relation if necessary
        if ($this !== $vendas->getTipoVenda()) {
            $vendas->setTipoVenda($this);
        }

        return $this;
    }
}

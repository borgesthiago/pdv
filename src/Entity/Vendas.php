<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\TipoVenda", inversedBy="vendas", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipo_venda;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="vendas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Recebimentos", mappedBy="vendas", cascade={"persist", "remove"})
     */
    private $recebimentos;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Funcionario", inversedBy="vendas", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $funcionario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Produtos", inversedBy="vendas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produtos;

   

    public function __construct()
    {
        $this->cliente = new ArrayCollection();
        $this->produtos = new ArrayCollection();
    }

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

    public function getTipoVenda(): ?TipoVenda
    {
        return $this->tipo_venda;
    }

    public function setTipoVenda(TipoVenda $tipo_venda): self
    {
        $this->tipo_venda = $tipo_venda;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getRecebimentos(): ?Recebimentos
    {
        return $this->recebimentos;
    }

    public function setRecebimentos(Recebimentos $recebimentos): self
    {
        $this->recebimentos = $recebimentos;

        // set the owning side of the relation if necessary
        if ($this !== $recebimentos->getVendas()) {
            $recebimentos->setVendas($this);
        }

        return $this;
    }

    public function getFuncionario(): ?Funcionario
    {
        return $this->funcionario;
    }

    public function setFuncionario(Funcionario $funcionario): self
    {
        $this->funcionario = $funcionario;

        return $this;
    }

    public function getProdutos(): ?Produtos
    {
        return $this->produtos;
    }

    public function setProdutos(?Produtos $produtos): self
    {
        $this->produtos = $produtos;

        return $this;
    }


}

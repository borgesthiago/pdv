<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProdutosRepository")
 */
class Produtos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $preco;

    /**
     * @ORM\Column(type="integer")
     */
    private $qtd;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $descricao;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fornecedor", inversedBy="produtos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fornecedor;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vendas", mappedBy="produtos")
     */
    private $vendas;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $status;

    public function __construct()
    {
        $this->vendas = new ArrayCollection();
    }

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getPreco(): ?float
    {
        return $this->preco;
    }

    public function setPreco(?float $preco): self
    {
        $this->preco = $preco;

        return $this;
    }

    public function getQtd(): ?int
    {
        return $this->qtd;
    }

    public function setQtd(int $qtd): self
    {
        $this->qtd = $qtd;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getFornecedor(): ?Fornecedor
    {
        return $this->fornecedor;
    }

    public function setFornecedor(?Fornecedor $fornecedor): self
    {
        $this->fornecedor = $fornecedor;

        return $this;
    }

    /**
     * @return Collection|Vendas[]
     */
    public function getVendas(): Collection
    {
        return $this->vendas;
    }

    public function addVenda(Vendas $venda): self
    {
        if (!$this->vendas->contains($venda)) {
            $this->vendas[] = $venda;
            $venda->setProdutos($this);
        }

        return $this;
    }

    public function removeVenda(Vendas $venda): self
    {
        if ($this->vendas->contains($venda)) {
            $this->vendas->removeElement($venda);
            // set the owning side to null (unless already changed)
            if ($venda->getProdutos() === $this) {
                $venda->setProdutos(null);
            }
        }

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

}

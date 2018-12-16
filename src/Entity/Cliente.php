<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 */
class Cliente
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
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $endereco;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $bairro;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $cidade;

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $uf;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $telefone;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $celular;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $nascimento;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Vendas", mappedBy="cliente")
     */
    private $vendas;

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

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(?string $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(?string $bairro): self
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(?string $cidade): self
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getUf(): ?string
    {
        return $this->uf;
    }

    public function setUf(?string $uf): self
    {
        $this->uf = $uf;

        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->celular;
    }

    public function setCelular(?string $celular): self
    {
        $this->celular = $celular;

        return $this;
    }

    public function getNascimento(): ?\DateTimeInterface
    {
        return $this->nascimento;
    }

    public function setNascimento(?\DateTimeInterface $nascimento): self
    {
        $this->nascimento = $nascimento;

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
            $venda->setCliente($this);
        }

        return $this;
    }

    public function removeVenda(Vendas $venda): self
    {
        if ($this->vendas->contains($venda)) {
            $this->vendas->removeElement($venda);
            // set the owning side to null (unless already changed)
            if ($venda->getCliente() === $this) {
                $venda->setCliente(null);
            }
        }

        return $this;
    }
}

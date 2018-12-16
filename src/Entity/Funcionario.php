<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FuncionarioRepository")
 */
class Funcionario
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $endereco;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $telefone;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $celular;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $cpf;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $salario;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="funcionario")     
     */
    private $user;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $admissao;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $demissao;

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

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(?string $endereco): self
    {
        $this->endereco = $endereco;

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

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getSalario(): ?float
    {
        return $this->salario;
    }

    public function setSalario(?float $salario): self
    {
        $this->salario = $salario;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAdmissao(): ?\DateTimeInterface
    {
        return $this->admissao;
    }

    public function setAdmissao(?\DateTimeInterface $admissao): self
    {
        $this->admissao = $admissao;

        return $this;
    }

    public function getDemissao(): ?\DateTimeInterface
    {
        return $this->demissao;
    }

    public function setDemissao(?\DateTimeInterface $demissao): self
    {
        $this->demissao = $demissao;

        return $this;
    }
}

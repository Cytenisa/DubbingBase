<?php

namespace App\Entity;

use App\Repository\AccountRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccountRepository::class)]
class Account
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ac_login = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ac_idtrakt = null;

    #[ORM\Column(length: 255)]
    private ?string $ac_pwd = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAcLogin(): ?string
    {
        return $this->ac_login;
    }

    public function setAcLogin(string $ac_login): static
    {
        $this->ac_login = $ac_login;

        return $this;
    }

    public function getAcIdtrakt(): ?string
    {
        return $this->ac_idtrakt;
    }

    public function setAcIdtrakt(?string $ac_idtrakt): static
    {
        $this->ac_idtrakt = $ac_idtrakt;

        return $this;
    }

    public function getAcPwd(): ?string
    {
        return $this->ac_pwd;
    }

    public function setAcPwd(string $ac_pwd): static
    {
        $this->ac_pwd = $ac_pwd;

        return $this;
    }
}

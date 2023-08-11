<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PhoneNumberRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhoneNumberRepository::class)]
class PhoneNumber
{
    public const CODE_COUNTRY = "380";

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 7)]
    private ?string $phoneNumber = null;

    #[ORM\ManyToOne(inversedBy: 'phoneNumbers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $phoneUser = null;

    #[ORM\ManyToOne(inversedBy: 'phoneNumbers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PhoneOperator $operator = null;

    #[ORM\Column]
    private ?float $balance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getPhoneUser(): ?User
    {
        return $this->phoneUser;
    }

    public function setPhoneUser(?User $phoneUser): static
    {
        $this->phoneUser = $phoneUser;

        return $this;
    }

    public function getOperator(): ?PhoneOperator
    {
        return $this->operator;
    }

    public function getOperatorCode(): ?string
    {
        return $this->operator?->getCode();
    }

    public function setOperator(?PhoneOperator $operator): static
    {
        $this->operator = $operator;

        return $this;
    }

    public function getBalance(): ?float
    {
        return $this->balance;
    }

    public function setBalance(float $balance): static
    {
        $this->balance = $balance;

        return $this;
    }

    public function getFullNumber(): string
    {
        return self::CODE_COUNTRY .
            ($this->getOperatorCode() ?? "") .
            ($this->getPhoneNumber() ?? "");
    }
}

<?php

declare(strict_types=1);

namespace App\DTO\Request;

use Symfony\Component\Validator\Constraints\NotBlank;

class CreateUserRequest
{
    #[NotBlank]
    private string $name;

    #[NotBlank]
    private \DateTimeInterface $birthdate;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBirthdate(): \DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): void
    {
        $this->birthdate = $birthdate;
    }
}

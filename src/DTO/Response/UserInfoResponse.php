<?php

declare(strict_types=1);

namespace App\DTO\Response;

class UserInfoResponse
{
    private string $userName;

    private \DateTimeInterface $birthdate;

    private array $phoneNumbers;

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getBirthdate(): \DateTimeInterface
    {
        return $this->birthdate;
    }

    /**
     * @return array
     */
    public function getPhoneNumbers(): array
    {
        return $this->phoneNumbers;
    }

    /**
     * @param string $userName
     * @param \DateTimeInterface $birthdate
     * @param array $phoneNumbers
     */
    public function __construct(string $userName, \DateTimeInterface $birthdate, array $phoneNumbers)
    {
        $this->userName = $userName;
        $this->birthdate = $birthdate;
        $this->phoneNumbers = $phoneNumbers;
    }
}

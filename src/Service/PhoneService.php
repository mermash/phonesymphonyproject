<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\Request\AddPhoneNumberRequest;
use App\DTO\Request\PhoneBalanceTopUpRequest;
use App\Entity\PhoneNumber;
use App\Exception\BalanceTopUpLimitException;
use App\Exception\PhoneNumberAlreadyExistsException;
use App\Exception\PhoneNumberBadFormatException;
use App\Exception\PhoneNumberNotFoundException;
use App\Exception\UnknownCountryCodeException;
use App\Repository\PhoneNumberRepository;
use App\Repository\PhoneOperatorRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;

class PhoneService
{
    private const BALANCE_TOP_UP_LIMIT = 100;

    public function __construct(
        private EntityManagerInterface $em,
        private UserRepository $userRepository,
        private PhoneOperatorRepository $phoneOperatorRepository,
        private PhoneNumberRepository $phoneNumberRepository
    )
    {
    }

    private function getPartsOfPhoneNumber(string $phoneNumber): array
    {
        $phoneParts = [];
        if (false === preg_match('/([0-9]{3})([0-9]{2})([0-9]{7})/', $phoneNumber, $phoneParts)) {
            throw new PhoneNumberBadFormatException();
        }
        return [
            "codeCountry" => $phoneParts[1],
            "operatorCode" => $phoneParts[2],
            "number" => $phoneParts[3],
        ];
    }


    public function addPhoneNumber(AddPhoneNumberRequest $request): void
    {
        list(
            "codeCountry" => $codeCountry,
            "operatorCode" => $operatorCode,
            "number" => $phone) = $this->getPartsOfPhoneNumber($request->getPhoneNumber());
        if ($codeCountry!== PhoneNumber::CODE_COUNTRY) {
            throw new UnknownCountryCodeException();
        }

        if ($this->phoneNumberRepository->exists($request->getUserId(), $codeCountry, $operatorCode, $phone)) {
            throw new PhoneNumberAlreadyExistsException();
        }
        $operator = $this->phoneOperatorRepository->getByCode($operatorCode);
        $user = $this->userRepository->getById($request->getUserId());
        $phoneNumber = new PhoneNumber();
        $phoneNumber->setPhoneNumber($phone);
        $phoneNumber->setOperator($operator);
        $phoneNumber->setPhoneUser($user);
        $phoneNumber->setBalance(0);
        $this->em->persist($phoneNumber);
        $this->em->flush();
    }

    public function phoneBalanceTopUp(PhoneBalanceTopUpRequest $request): void
    {
        if ($request->getAmount() >= self::BALANCE_TOP_UP_LIMIT) {
            throw new BalanceTopUpLimitException();
        }

        $user = $this->userRepository->getById($request->getUserId());
        $phoneNumbers = $user->getPhoneNumbers();

        foreach ($phoneNumbers as $phoneNumber) {
            if ($request->getPhoneNumber() == $phoneNumber->getFullNumber()) {
                $phoneNumber->setBalance($phoneNumber->getBalance() + $request->getAmount());
                $this->em->flush();
                return;
            }
        }

        throw new PhoneNumberNotFoundException();
    }
}

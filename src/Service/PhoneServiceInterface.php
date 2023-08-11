<?php

namespace App\Service;

use App\DTO\Request\AddPhoneNumberRequest;
use App\DTO\Request\PhoneBalanceTopUpRequest;

interface PhoneServiceInterface
{
    public function addPhoneNumber(AddPhoneNumberRequest $request): void;
    public function phoneBalanceTopUp(PhoneBalanceTopUpRequest $request): void;
}

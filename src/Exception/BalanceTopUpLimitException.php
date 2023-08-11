<?php

declare(strict_types=1);

namespace App\Exception;

use RuntimeException;

class BalanceTopUpLimitException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Balance can't be topped up with this amount");
    }
}

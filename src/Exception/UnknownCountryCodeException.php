<?php

declare(strict_types=1);

namespace App\Exception;

use RuntimeException;

class UnknownCountryCodeException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Unknown country code for phone number");
    }
}

<?php

declare(strict_types=1);

namespace App\Exception;

use RuntimeException;

class PhoneNumberBadFormatException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Phone number bad format");
    }
}

<?php

declare(strict_types=1);

namespace App\Exception;

use RuntimeException;

class PhoneOperatorNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct("Phone operator not found");
    }
}

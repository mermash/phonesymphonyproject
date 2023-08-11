<?php

declare(strict_types=1);

namespace App\Exception;

use RuntimeException;
use Throwable;

class RequestBodyConvertException extends RuntimeException
{
    public function __construct(Throwable $previous)
    {
        parent::__construct("error while unmarshaling request body: " . $previous->getMessage(), 0, $previous);
    }
}

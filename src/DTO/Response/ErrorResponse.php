<?php

declare(strict_types=1);

namespace App\DTO\Response;

class ErrorResponse
{
    public function __construct(private string $message)
    {
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}

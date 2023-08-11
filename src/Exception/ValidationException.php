<?php

declare(strict_types=1);

namespace App\Exception;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;
use RuntimeException;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationException extends RuntimeException
{
    public function __construct(private ConstraintViolationListInterface $violationList)
    {
        parent::__construct('violation failed');
    }

    public function getViolations(): ConstraintViolationListInterface
    {
        return $this->violationList;
    }
}

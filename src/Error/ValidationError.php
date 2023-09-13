<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Error;

use Throwable;

class ValidationError extends DomainError
{
    public function __construct(
        array|string $message = '',
        int $code = 1,
        ?Throwable $previous = null,
    ) {
        if (is_array($message)) {
            $message = json_encode($message);
        }
        parent::__construct($message, $code, $previous);
    }
}

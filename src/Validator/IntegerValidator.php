<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Validator;

class IntegerValidator extends Validator
{
    private bool $isValid = false;

    public function validate(mixed $input): bool
    {
        $this->isValid = is_int($input);

        return $this->isValid;
    }

    public function getErrorMessage(): string|null
    {
        return !$this->isValid ? 'Invalid integer number' : null;
    }
}

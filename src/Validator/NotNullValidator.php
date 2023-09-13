<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Validator;

class NotNullValidator extends Validator
{
    private bool $isValid = false;

    public function validate(mixed $input): bool
    {
        $this->isValid = null !== $input;

        return $this->isValid;
    }

    public function getErrorMessage(): string|null
    {
        return !$this->isValid ? 'Cannot be null' : null;
    }
}

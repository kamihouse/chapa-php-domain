<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Validator;

class NotEmptyValidator extends Validator
{
    private bool $isValid = false;

    public function validate(mixed $input): bool
    {
        $this->isValid = !empty($input);

        return $this->isValid;
    }

    public function getErrorMessage(): string|null
    {
        return !$this->isValid ? 'Cannot be empty' : null;
    }
}

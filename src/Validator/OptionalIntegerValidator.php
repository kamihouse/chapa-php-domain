<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Validator;

class OptionalIntegerValidator extends Validator
{
    private bool $isValid = false;

    public function validate(mixed $input): bool
    {
        if (null === $input) {
            $this->isValid = true;

            return $this->isValid;
        }
        $this->isValid = (new IntegerValidator())->validate($input);

        return $this->isValid;
    }

    public function getErrorMessage(): string|null
    {
        return !$this->isValid ? 'Invalid integer number' : null;
    }
}

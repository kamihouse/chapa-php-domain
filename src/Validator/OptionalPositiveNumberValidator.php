<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Validator;

class OptionalPositiveNumberValidator extends Validator
{
    private bool $isValid = false;

    public function validate(mixed $input): bool
    {
        if (null === $input) {
            $this->isValid = true;

            return $this->isValid;
        }
        $this->isValid = (new PositiveNumberValidator())->validate($input);

        return $this->isValid;
    }

    public function getErrorMessage(): string|null
    {
        return !$this->isValid ? 'Not a positive number' : null;
    }
}

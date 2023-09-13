<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Validator\Pt_BR;

use ChapaPhp\Domain\Validator\Validator;

class OptionalPhoneValidator extends Validator
{
    private bool $isValid = false;

    public function validate(mixed $input): bool
    {
        if (empty($input)) {
            $this->isValid = true;

            return $this->isValid;
        }

        $this->isValid = (new PhoneValidator())->validate($input);

        return $this->isValid;
    }

    public function getErrorMessage(): string|null
    {
        return !$this->isValid ? 'Invalid phone number' : null;
    }
}

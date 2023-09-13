<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Validator;

abstract class Validator
{
    abstract public function validate(mixed $input): bool;

    /**
     * @template T of string|array|null
     *
     * @return T
     */
    abstract public function getErrorMessage();
}

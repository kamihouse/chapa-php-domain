<?php

declare(strict_types=1);

namespace ChapaPhp\Domain;

class Header
{
    public function __construct(
        private HeaderKey $key,
        private string $value
    ) {
    }

    public function key(): HeaderKey
    {
        return $this->key;
    }

    public function value(): string
    {
        return $this->value;
    }
}

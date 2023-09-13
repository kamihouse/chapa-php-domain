<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\ValueObject;

class Money
{
    public function __construct(
        private float $amount,
        private Currency $currency,
    ) {
    }

    public function amount(): float
    {
        return $this->amount;
    }

    public function currency(): Currency
    {
        return $this->currency;
    }
}

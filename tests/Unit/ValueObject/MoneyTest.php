<?php

declare(strict_types=1);

namespace Tests\Unit\ValueObject;

use ChapaPhp\Domain\ValueObject\Currency;
use ChapaPhp\Domain\ValueObject\Money;
use Tests\TestCase;

/**
 * @internal
 */
class MoneyTest extends TestCase
{
    public function test_get_amount(): void
    {
        $currency = Currency::REAL;
        $money = new Money(100.50, $currency);

        $this->assertEquals(100.50, $money->amount());
    }

    public function test_get_currency(): void
    {
        $currency = Currency::DOLAR_AMERICANO;
        $money = new Money(100.50, $currency);

        $this->assertSame($currency, $money->currency());
    }
}

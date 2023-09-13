<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\ValueObject;

enum Currency: string
{
    case REAL = 'BRL';
    case DOLAR_AMERICANO = 'USD';
    case EURO = 'EUR';
}

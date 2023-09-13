<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\ValueObject;

enum DocumentKind: string
{
    case CNPJ = 'cnpj';
    case CPF = 'cpf';
}

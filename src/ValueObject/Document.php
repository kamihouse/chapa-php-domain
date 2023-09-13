<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\ValueObject;

class Document
{
    public function __construct(
        private DocumentKind $kind,
        private string $number
    ) {
    }

    public function kind(): DocumentKind
    {
        return $this->kind;
    }

    public function number(): string
    {
        return $this->number;
    }
}

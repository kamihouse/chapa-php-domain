<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\ValueObject;

use ChapaPhp\Domain\Creator\Builder;

/**
 * @implements Builder<Document>
 */
class DocumentBuilder implements Builder
{
    private string $number;
    private DocumentKind $kind;

    public function withNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function withKind(string|DocumentKind $kind): self
    {
        if ($kind instanceof DocumentKind) {
            $this->kind = $kind;
        } else {
            $this->kind = DocumentKind::from($kind);
        }

        return $this;
    }

    public function build(): Document
    {
        $instance = new Document($this->kind, $this->number);
        unset($this->number, $this->kind);

        return $instance;
    }

    public function targetType(): string
    {
        return Document::class;
    }
}

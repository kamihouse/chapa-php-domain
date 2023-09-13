<?php

declare(strict_types=1);

namespace Tests\Unit\ValueObject;

use ChapaPhp\Domain\ValueObject\Document;
use ChapaPhp\Domain\ValueObject\DocumentKind;
use Tests\TestCase;

/**
 * @internal
 */
class DocumentTest extends TestCase
{
    public function test_document_kind()
    {
        $kind = DocumentKind::CNPJ;
        $document = new Document($kind, 'AB123456');

        $this->assertSame($kind, $document->kind());
    }

    public function test_document_number()
    {
        $kind = DocumentKind::CPF;
        $document = new Document($kind, 'AB123456');

        $this->assertSame('AB123456', $document->number());
    }
}

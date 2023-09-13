<?php

declare(strict_types=1);

namespace Tests\Unit\ValueObject;

use ChapaPhp\Domain\ValueObject\Document;
use ChapaPhp\Domain\ValueObject\DocumentBuilder;
use ChapaPhp\Domain\ValueObject\DocumentKind;
use Tests\TestCase;

/**
 * @internal
 */
class DocumentBuilderTest extends TestCase
{
    public function test_build_with_string_kind()
    {
        $documentBuilder = new DocumentBuilder();
        $document = $documentBuilder->withNumber('123456789')->withKind('cpf')->build();

        $this->assertInstanceOf(Document::class, $document);
        $this->assertSame(DocumentKind::CPF, $document->kind());
        $this->assertSame('123456789', $document->number());
    }

    public function test_build_with_document_kind()
    {
        $documentBuilder = new DocumentBuilder();
        $document = $documentBuilder->withNumber('123456789')->withKind(DocumentKind::CPF)->build();

        $this->assertInstanceOf(Document::class, $document);
        $this->assertSame(DocumentKind::CPF, $document->kind());
        $this->assertSame('123456789', $document->number());
    }

    public function test_target_type()
    {
        $documentBuilder = new DocumentBuilder();

        $this->assertSame(Document::class, $documentBuilder->targetType());
    }
}

<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\AttributeValidator;
use ChapaPhp\Domain\Validator\Validator;
use Tests\TestCase;

/**
 * @internal
 */
class AttributeValidatorTest extends TestCase
{
    public function test_constructor(): void
    {
        $validator = $this->createMock(Validator::class);
        $attributeValidator = new AttributeValidator('attribute', $validator);
        $this->assertInstanceOf(AttributeValidator::class, $attributeValidator);
    }

    public function test_get_attribute(): void
    {
        $validator = $this->createMock(Validator::class);
        $attributeValidator = new AttributeValidator('attribute', $validator);
        $this->assertEquals('attribute', $attributeValidator->attribute);
    }

    public function test_set_validator(): void
    {
        $validator = $this->createMock(Validator::class);
        $attributeValidator = new AttributeValidator('attribute', $validator);
        $attributeValidator->setValidator($validator);
        $this->assertInstanceOf(Validator::class, $attributeValidator->getValidator());
    }

    public function test_get_validator(): void
    {
        $validator = $this->createMock(Validator::class);
        $attributeValidator = new AttributeValidator('attribute', $validator);
        $this->assertInstanceOf(Validator::class, $attributeValidator->getValidator());
    }

    public function test_validate(): void
    {
        $validator = $this->createMock(Validator::class);
        $validator->method('validate')->willReturn(true);
        $attributeValidator = new AttributeValidator('attribute', $validator);
        $this->assertTrue($attributeValidator->validate('input'));
    }

    public function test_validate_with_error(): void
    {
        $validator = $this->createMock(Validator::class);
        $validator->method('validate')->willReturn(false);
        $validator->method('getErrorMessage')->willReturn('error');
        $attributeValidator = new AttributeValidator('attribute', $validator);
        $this->assertFalse($attributeValidator->validate('input'));
        $this->assertEquals(['attribute' => 'error'], $attributeValidator->getErrorMessage());
    }

    public function test_validate_array(): void
    {
        $validator = $this->createMock(Validator::class);
        $validator->method('validate')->willReturn(true);
        $attributeValidator = new AttributeValidator('attribute', $validator);
        $this->assertTrue($attributeValidator->validate(['attribute' => 'input']));
    }

    public function test_validate_array_with_errors(): void
    {
        $validator = $this->createMock(Validator::class);
        $validator->method('validate')->willReturn(false);
        $validator->method('getErrorMessage')->willReturn('error');
        $attributeValidator = new AttributeValidator('attribute', $validator);
        $this->assertFalse($attributeValidator->validate(['attribute' => 'input']));
        $this->assertEquals(['attribute' => 'error'], $attributeValidator->getErrorMessage());
    }

    public function test_validate_object(): void
    {
        $validator = $this->createMock(Validator::class);
        $validator->method('validate')->willReturn(true);
        $attributeValidator = new AttributeValidator('attribute', $validator);
        $this->assertTrue($attributeValidator->validate((object) ['attribute' => 'input']));
    }

    public function test_validate_object_with_errors(): void
    {
        $validator = $this->createMock(Validator::class);
        $validator->method('validate')->willReturn(false);
        $validator->method('getErrorMessage')->willReturn('error');
        $attributeValidator = new AttributeValidator('attribute', $validator);
        $this->assertFalse($attributeValidator->validate((object) ['attribute' => 'input']));
        $this->assertEquals(['attribute' => 'error'], $attributeValidator->getErrorMessage());
    }
}

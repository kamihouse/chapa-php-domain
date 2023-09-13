<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\OptionalIntegerValidator;
use Tests\TestCase;

/**
 * @internal
 */
class OptionalIntegerValidatorTest extends TestCase
{
    public function test_should_validate_integer()
    {
        $validator = new OptionalIntegerValidator();
        $this->assertTrue($validator->validate(10));
    }

    public function test_should_validate_integer_is_null()
    {
        $validator = new OptionalIntegerValidator();
        $this->assertTrue($validator->validate(null));
    }

    public function test_should_not_validate_integer()
    {
        $validator = new OptionalIntegerValidator();
        $this->assertFalse($validator->validate(2.5));
        $this->assertEquals('Invalid integer number', $validator->getErrorMessage());
    }
}

<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\OptionalFloatValidator;
use Tests\TestCase;

/**
 * @internal
 */
class OptionalFloatValidatorTest extends TestCase
{
    public function test_should_validate_float()
    {
        $validator = new OptionalFloatValidator();
        $this->assertTrue($validator->validate(2.5));
    }

    public function test_should_validate_float_is_null()
    {
        $validator = new OptionalFloatValidator();
        $this->assertTrue($validator->validate(null));
    }

    public function test_should_not_validate_float()
    {
        $validator = new OptionalFloatValidator();
        $this->assertFalse($validator->validate(10));
        $this->assertEquals('Invalid float number', $validator->getErrorMessage());
    }
}

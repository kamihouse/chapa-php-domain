<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\FloatValidator;
use Tests\TestCase;

/**
 * @internal
 */
class FloatValidatorTest extends TestCase
{
    public function test_should_validate_float()
    {
        $validator = new FloatValidator();
        $this->assertTrue($validator->validate(2.5));
    }

    public function test_should_not_validate_float()
    {
        $validator = new FloatValidator();
        $this->assertFalse($validator->validate(10));
        $this->assertEquals('Invalid float number', $validator->getErrorMessage());
    }
}

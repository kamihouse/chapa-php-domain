<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\IntegerValidator;
use Tests\TestCase;

/**
 * @internal
 */
class IntegerValidatorTest extends TestCase
{
    public function test_should_validate_integer()
    {
        $validator = new IntegerValidator();
        $this->assertTrue($validator->validate(10));
    }

    public function test_should_not_validate_integer()
    {
        $validator = new IntegerValidator();
        $this->assertFalse($validator->validate(2.5));
        $this->assertEquals('Invalid integer number', $validator->getErrorMessage());
    }
}

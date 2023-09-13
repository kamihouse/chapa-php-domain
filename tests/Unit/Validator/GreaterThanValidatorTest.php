<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\GreaterThanValidator;
use Tests\TestCase;

/**
 * @internal
 */
class GreaterThanValidatorTest extends TestCase
{
    public function test_validate_returns_true_for_valid_input()
    {
        $validator = new GreaterThanValidator(0);
        $this->assertTrue($validator->validate(10));
        $this->assertTrue($validator->validate(3.14));
        $this->assertTrue($validator->validate(PHP_INT_MAX));
    }

    public function test_validate_returns_false_for_invalid_input()
    {
        $validator = new GreaterThanValidator(0);
        $this->assertFalse($validator->validate(-10));
        $this->assertFalse($validator->validate(0));
        $this->assertFalse($validator->validate('not a number'));
    }

    public function test_get_error_message_returns_string()
    {
        $validator = new GreaterThanValidator(0);
        $this->assertIsString($validator->getErrorMessage());
    }

    public function test_get_error_message_returns_correct_string()
    {
        $min = -5;
        $validator = new GreaterThanValidator($min);
        $this->assertEquals("Value must be numeric and greater than {$min}", $validator->getErrorMessage());
    }
}

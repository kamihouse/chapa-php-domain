<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\LessThanValidator;
use Tests\TestCase;

/**
 * @internal
 */
class LessThanValidatorTest extends TestCase
{
    public function test_less_than_validator_returns_true_on_valid_input()
    {
        $max = 10;
        $input = 5;

        $validator = new LessThanValidator($max);

        $this->assertTrue($validator->validate($input));
    }

    public function test_less_than_validator_returns_false_on_input_equal_to_max()
    {
        $max = 10;
        $input = 10;

        $validator = new LessThanValidator($max);

        $this->assertFalse($validator->validate($input));
    }

    public function test_less_than_validator_returns_false_on_invalid_input()
    {
        $max = 10;
        $input = 'invalid';

        $validator = new LessThanValidator($max);

        $this->assertFalse($validator->validate($input));
    }

    public function test_less_than_validator_returns_correct_error_message()
    {
        $max = 10;
        $invalidInput = 'invalid';
        $validator = new LessThanValidator($max);

        $this->assertEquals('The value must be numeric and less than 10', $validator->getErrorMessage());
        $this->assertIsString($validator->getErrorMessage());

        $validator->validate($invalidInput);

        $this->assertEquals('The value must be numeric and less than 10', $validator->getErrorMessage());
    }
}

<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\LengthValidator;
use Tests\TestCase;

/**
 * @internal
 */
class LengthValidatorTest extends TestCase
{
    public function test_should_validate_length()
    {
        $validator = new LengthValidator(5, 10);
        $this->assertTrue($validator->validate('1234567890'));
    }

    public function test_should_not_validate_length_greater_than_max()
    {
        $validator = new LengthValidator(5, 10);
        $this->assertFalse($validator->validate('12345678901'));
        $this->assertEquals('Invalid length', $validator->getErrorMessage());
    }

    public function test_should_not_validate_length_less_than_min()
    {
        $validator = new LengthValidator(5, 10);
        $this->assertFalse($validator->validate('1234'));
        $this->assertEquals('Invalid length', $validator->getErrorMessage());
    }

    public function test_should_not_validate_length_is_null()
    {
        $validator = new LengthValidator(5, 10);
        $this->assertFalse($validator->validate(null));
        $this->assertEquals('Invalid length', $validator->getErrorMessage());
    }
}

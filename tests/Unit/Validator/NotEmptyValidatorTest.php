<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\NotEmptyValidator;
use Tests\TestCase;

/**
 * @internal
 */
class NotEmptyValidatorTest extends TestCase
{
    public function test_should_validate_empty_string()
    {
        $validator = new NotEmptyValidator();
        $this->assertFalse($validator->validate(''));
        $this->assertEquals('Cannot be empty', $validator->getErrorMessage());
    }

    public function test_should_validate_empty_array()
    {
        $validator = new NotEmptyValidator();
        $this->assertFalse($validator->validate([]));
        $this->assertEquals('Cannot be empty', $validator->getErrorMessage());
    }

    public function test_should_validate_null()
    {
        $validator = new NotEmptyValidator();
        $this->assertFalse($validator->validate(null));
        $this->assertEquals('Cannot be empty', $validator->getErrorMessage());
    }

    public function test_should_validate_false()
    {
        $validator = new NotEmptyValidator();
        $this->assertFalse($validator->validate(false));
        $this->assertEquals('Cannot be empty', $validator->getErrorMessage());
    }

    public function test_should_validate_zero()
    {
        $validator = new NotEmptyValidator();
        $this->assertFalse($validator->validate(0));
        $this->assertEquals('Cannot be empty', $validator->getErrorMessage());
    }

    public function test_should_validate_not_empty_string()
    {
        $validator = new NotEmptyValidator();
        $this->assertTrue($validator->validate('test'));
    }

    public function test_should_validate_not_empty_array()
    {
        $validator = new NotEmptyValidator();
        $this->assertTrue($validator->validate(['test']));
    }

    public function test_should_validate_true()
    {
        $validator = new NotEmptyValidator();
        $this->assertTrue($validator->validate(true));
    }

    public function test_should_validate_integer()
    {
        $validator = new NotEmptyValidator();
        $this->assertTrue($validator->validate(1));
    }

    public function test_should_validate_float()
    {
        $validator = new NotEmptyValidator();
        $this->assertTrue($validator->validate(1.1));
    }
}

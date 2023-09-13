<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\OptionalStringValidator;
use Tests\TestCase;

/**
 * @internal
 */
class OptionalStringValidatorTest extends TestCase
{
    public function test_should_validate_string()
    {
        $validator = new OptionalStringValidator();
        $this->assertTrue($validator->validate('string'));
    }

    public function test_should_validate_string_is_null()
    {
        $validator = new OptionalStringValidator();
        $this->assertTrue($validator->validate(null));
    }

    public function test_should_not_validate_string()
    {
        $validator = new OptionalStringValidator();
        $this->assertFalse($validator->validate(10));
        $this->assertEquals('Invalid string', $validator->getErrorMessage());
    }
}

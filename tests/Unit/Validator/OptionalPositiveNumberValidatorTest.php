<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\OptionalPositiveNumberValidator;
use Tests\TestCase;

/**
 * @internal
 */
class OptionalPositiveNumberValidatorTest extends TestCase
{
    public function test_should_validate_positive()
    {
        $validator = new OptionalPositiveNumberValidator();
        $this->assertTrue($validator->validate(10));
    }

    public function test_should_validate_positive_is_null()
    {
        $validator = new OptionalPositiveNumberValidator();
        $this->assertTrue($validator->validate(null));
    }

    public function test_should_not_validate_positive()
    {
        $validator = new OptionalPositiveNumberValidator();
        $this->assertFalse($validator->validate(-10));
        $this->assertEquals('Not a positive number', $validator->getErrorMessage());
    }
}

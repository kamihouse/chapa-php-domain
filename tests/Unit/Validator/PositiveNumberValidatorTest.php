<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\PositiveNumberValidator;
use Tests\TestCase;

/**
 * @internal
 */
class PositiveNumberValidatorTest extends TestCase
{
    public function test_should_validate_positive()
    {
        $validator = new PositiveNumberValidator();
        $this->assertTrue($validator->validate(10));
    }

    public function test_should_not_validate_positive()
    {
        $validator = new PositiveNumberValidator();
        $this->assertFalse($validator->validate(-10));
        $this->assertEquals('Not a positive number', $validator->getErrorMessage());
    }
}

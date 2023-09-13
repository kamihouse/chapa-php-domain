<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\StringValidator;
use Tests\TestCase;

/**
 * @internal
 */
class StringValidatorTest extends TestCase
{
    public function test_should_validate_string()
    {
        $validator = new StringValidator();
        $this->assertTrue($validator->validate('string'));
    }

    public function test_should_not_validate_string()
    {
        $validator = new StringValidator();
        $this->assertFalse($validator->validate(10));
        $this->assertEquals('Invalid string', $validator->getErrorMessage());
    }
}

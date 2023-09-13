<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\BooleanValidator;
use Tests\TestCase;

/**
 * @internal
 */
class BooleanValidatorTest extends TestCase
{
    public function test_should_validate_boolean()
    {
        $validator = new BooleanValidator();
        $this->assertTrue($validator->validate(true));
    }

    public function test_should_not_validate_boolean()
    {
        $validator = new BooleanValidator();
        $this->assertFalse($validator->validate('true'));
        $this->assertEquals('Invalid boolean', $validator->getErrorMessage());
    }
}

<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\OptionalEmailValidator;
use Tests\TestCase;

/**
 * @internal
 */
class OptionalEmailValidatorTest extends TestCase
{
    public function test_should_validate_email()
    {
        $validator = new OptionalEmailValidator();
        $this->assertTrue($validator->validate('dummy@email.com.br'));
    }

    public function test_should_validate_email_is_null()
    {
        $validator = new OptionalEmailValidator();
        $this->assertTrue($validator->validate(null));
    }

    public function test_should_not_validate_email()
    {
        $validator = new OptionalEmailValidator();
        $this->assertFalse($validator->validate('dummyemail.com.br'));
        $this->assertEquals('Invalid email address', $validator->getErrorMessage());
    }
}

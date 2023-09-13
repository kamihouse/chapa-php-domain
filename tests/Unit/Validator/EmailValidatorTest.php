<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\EmailValidator;
use Tests\TestCase;

/**
 * @internal
 */
class EmailValidatorTest extends TestCase
{
    public function test_should_validate_email()
    {
        $validator = new EmailValidator();
        $this->assertTrue($validator->validate('dummy@email.com.br'));
    }

    public function test_should_not_validate_email()
    {
        $validator = new EmailValidator();
        $this->assertFalse($validator->validate('dummyemail.com.br'));
        $this->assertEquals('Invalid email address', $validator->getErrorMessage());
    }
}

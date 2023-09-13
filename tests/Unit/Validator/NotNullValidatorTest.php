<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\NotNullValidator;
use Tests\TestCase;

/**
 * @internal
 */
class NotNullValidatorTest extends TestCase
{
    private NotNullValidator $validator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->validator = new NotNullValidator();
    }

    public function test_validate_returns_true_when_input_is_not_null(): void
    {
        $input = 'some value';
        $isValid = $this->validator->validate($input);

        $this->assertTrue($isValid);
    }

    public function test_validate_returns_false_when_input_is_null(): void
    {
        $input = null;
        $isValid = $this->validator->validate($input);

        $this->assertFalse($isValid);
    }

    public function test_get_error_message_returns_string(): void
    {
        $errorMessage = $this->validator->getErrorMessage();

        $this->assertIsString($errorMessage);
    }

    public function test_get_error_message_returns_expected_string(): void
    {
        $expectedErrorMessage = 'Cannot be null';
        $errorMessage = $this->validator->getErrorMessage();

        $this->assertEquals($expectedErrorMessage, $errorMessage);
    }
}

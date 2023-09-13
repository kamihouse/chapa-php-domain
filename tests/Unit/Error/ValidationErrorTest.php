<?php

declare(strict_types=1);

namespace Tests\Unit\Error;

use ChapaPhp\Domain\Error\ValidationError;
use Exception;
use Tests\TestCase;

/**
 * @internal
 */
class ValidationErrorTest extends TestCase
{
    public function test_validation_error_can_be_created_from_array(): void
    {
        $errorMessage = ['error' => 'Something went wrong'];
        $error = new ValidationError($errorMessage);
        $this->assertEquals(json_encode($errorMessage), $error->getMessage());
    }

    public function test_validation_error_can_be_created_from_string(): void
    {
        $errorMessage = 'Something went wrong';
        $error = new ValidationError($errorMessage);
        $this->assertEquals($errorMessage, $error->getMessage());
    }

    public function test_validation_error_passes_code(): void
    {
        $errorCode = 123;
        $error = new ValidationError('error', $errorCode);
        $this->assertEquals($errorCode, $error->getCode());
    }

    public function test_validation_error_passes_previous_error(): void
    {
        $previousError = new Exception('Previous error');
        $error = new ValidationError('error', 1, $previousError);
        $this->assertSame($previousError, $error->getPrevious());
    }
}

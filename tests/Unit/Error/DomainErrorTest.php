<?php

declare(strict_types=1);

namespace Tests\Unit\Errors;

// use ChapaPhp\Domain\Errors\DomainError;
use ChapaPhp\Domain\Error\DomainError;
use RuntimeException;
use Tests\TestCase;

/**
 * @internal
 */
class DomainErrorTest extends TestCase
{
    public function test_domain_error_has_proper_message()
    {
        $message = 'Test error message';
        $error = new DomainError($message);
        $this->assertSame($message, $error->getMessage());
    }

    public function test_domain_error_has_proper_code()
    {
        $code = 123;
        $error = new DomainError('Test error message', $code);
        $this->assertSame($code, $error->getCode());
    }

    public function test_domain_error_has_proper_previous_exception()
    {
        $previous = new RuntimeException('Previous Exception');
        $error = new DomainError('Test error message', 0, $previous);
        $this->assertSame($previous, $error->getPrevious());
    }
}

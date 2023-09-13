<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\DateValidator;
use Tests\TestCase;

/**
 * @internal
 */
class DateValidatorTest extends TestCase
{
    public function test_should_validate_date()
    {
        $validator = new DateValidator();
        $this->assertTrue($validator->validate('2020-05-05 15:54:00'));
    }

    public function test_should_not_validate_date()
    {
        $validator = new DateValidator();
        $this->assertFalse($validator->validate('2020/14/01 24:33:12'));
        $this->assertEquals('Invalid date format', $validator->getErrorMessage());
    }
}

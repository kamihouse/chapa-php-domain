<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\OptionalDateValidator;
use Tests\TestCase;

/**
 * @internal
 */
class OptionalDateValidatorTest extends TestCase
{
    public function test_should_validate_date()
    {
        $validator = new OptionalDateValidator();
        $this->assertTrue($validator->validate('2020-05-05 15:54:00'));
    }

    public function test_should_validate_date_is_null()
    {
        $validator = new OptionalDateValidator();
        $this->assertTrue($validator->validate(null));
    }

    public function test_should_not_validate_date()
    {
        $validator = new OptionalDateValidator();
        $this->assertFalse($validator->validate('2020/14/01 24:33:12'));
        $this->assertEquals('Invalid date format', $validator->getErrorMessage());
    }
}

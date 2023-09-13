<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\CpfValidator;
use Tests\TestCase;

/**
 * @internal
 */
class CpfValidatorTest extends TestCase
{
    public function test_should_validate_individual_person()
    {
        $validator = new CpfValidator();
        $this->assertTrue($validator->validate('75625164304'));
    }

    public function test_should_validate_is_null()
    {
        $validator = new CpfValidator();
        $this->assertFalse($validator->validate(null));
        $this->assertEquals('Invalid cpf', $validator->getErrorMessage());
    }

    public function test_should_not_validate_individual_person()
    {
        $validator = new CpfValidator();
        $this->assertFalse($validator->validate('12345678901'));
        $this->assertEquals('Invalid cpf', $validator->getErrorMessage());
    }
}

<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\PersonDocumentValidator;
use Tests\TestCase;

/**
 * @internal
 */
class PersonDocumentValidatorTest extends TestCase
{
    public function test_should_validate_individual_person()
    {
        $validator = new PersonDocumentValidator();
        $this->assertTrue($validator->validate('75625164304'));
    }

    public function test_should_validate_legal_person()
    {
        $validator = new PersonDocumentValidator();
        $this->assertTrue($validator->validate('54392054000179'));
    }

    public function test_should_validate_is_null()
    {
        $validator = new PersonDocumentValidator();
        $this->assertFalse($validator->validate(null));
        $this->assertEquals('Invalid document', $validator->getErrorMessage());
    }

    public function test_should_not_validate_individual_person()
    {
        $validator = new PersonDocumentValidator();
        $this->assertFalse($validator->validate('12345678901'));
        $this->assertEquals('Invalid document', $validator->getErrorMessage());
    }

    public function test_should_not_validate_legal_person()
    {
        $validator = new PersonDocumentValidator();
        $this->assertFalse($validator->validate('54392054000000'));
        $this->assertEquals('Invalid document', $validator->getErrorMessage());
    }
}

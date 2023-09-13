<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\Validator;
use ChapaPhp\Domain\Validator\ValidatorCollectionDecorator;
use ChapaPhp\Domain\Validator\ValidatorComposite;
use Tests\TestCase;

/**
 * @internal
 */
class ValidatorCompositeTest extends TestCase
{
    public function test_add_validator()
    {
        $validatorComposite = new ValidatorComposite();
        $validator1 = $this->createMock(Validator::class);
        $validator2 = $this->createMock(Validator::class);
        $validatorComposite->addValidator($validator1);
        $validatorComposite->addValidator($validator2);

        $this->assertCount(2, $validatorComposite->getValidators());
    }

    public function test_validate_single_value()
    {
        $validatorComposite = new ValidatorComposite();
        $validator1 = $this->createMock(Validator::class);
        $validator1->method('validate')->willReturn(true);
        $validator2 = $this->createMock(Validator::class);
        $validator2->method('validate')->willReturn(true);
        $validatorComposite->addValidator($validator1);
        $validatorComposite->addValidator($validator2);

        $isValid = $validatorComposite->validate('some-value');
        $this->assertTrue($isValid);
    }

    public function test_validate_multiple_values()
    {
        $validator = $this->createMock(Validator::class);
        $validator->expects($this->exactly(3))->method('validate')->willReturn(false);
        $validator->expects($this->exactly(3))->method('getErrorMessage')->willReturn('error');

        $input = ['some-value-1', 'some-value-2', 'some-value-3'];
        $expected = [
            'isValid' => false,
            'errorMessage' => [
                0 => 'error',
                1 => 'error',
                2 => 'error',
            ],
        ];

        $validatorCollectionDecorator = new ValidatorCollectionDecorator($validator);
        $validatorComposite = new ValidatorComposite();
        $validatorComposite->addValidator($validatorCollectionDecorator);

        $actual = [
            'isValid' => $validatorComposite->validate($input),
            'errorMessage' => $validatorComposite->getErrorMessage(),
        ];

        $this->assertEquals($expected, $actual);
    }
}

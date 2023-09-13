<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\Validator;
use ChapaPhp\Domain\Validator\ValidatorCollectionDecorator;
use Tests\TestCase;

/**
 * @internal
 */
final class ValidatorCollectionDecoratorTest extends TestCase
{
    private ValidatorCollectionDecorator $sut;

    public function test_should_validate_collection_with_errors(): void
    {
        $input = ['a', 'b', 'c'];
        $expected = [
            'isValid' => false,
            'errorMessage' => [
                0 => 'error',
                1 => 'error',
                2 => 'error',
            ],
        ];

        $validator = $this->createMock(Validator::class);
        $validator->expects($this->exactly(3))->method('validate')->willReturn(false);
        $validator->expects($this->exactly(3))->method('getErrorMessage')->willReturn('error');

        $this->sut = new ValidatorCollectionDecorator($validator);

        $actual = [
            'isValid' => $this->sut->validate($input),
            'errorMessage' => $this->sut->getErrorMessage(),
        ];

        $this->assertEquals($expected, $actual);
    }
}

<?php

declare(strict_types=1);

namespace Tests\Unit\Validator\Pt_BR;

use ChapaPhp\Domain\Validator\Pt_BR\PhoneValidator;
use Tests\TestCase;

/**
 * @internal
 */
class PhoneValidatorTest extends TestCase
{
    /**
     * @dataProvider phoneNumbersSuccesfulyProvider
     */
    public function test_should_validate_phone($input)
    {
        $validator = new PhoneValidator();
        $this->assertTrue($validator->validate($input));
    }

    public static function phoneNumbersSuccesfulyProvider(): iterable
    {
        yield 'format DDI + DDD + phone number' => [
            'input' => '+55(21)98765-5678',
        ];

        yield 'format DDD + phone number' => [
            'input' => '(21)98765-5678',
        ];

        yield 'format only phone number' => [
            'input' => '98765-5678',
        ];

        yield 'format without parentheses DDI + DDD + phone number' => [
            'input' => '+552198765-5678',
        ];

        yield 'format without parentheses and hyphen DDI + DDD + phone number' => [
            'input' => '+55(21)987655678',
        ];

        yield 'format only numbers DDI + DDD + PhoneNumber' => [
            'input' => '+5521987655678',
        ];

        yield 'format only numbers DDI + DDD + PhoneNumber2' => [
            'input' => '+21987655678',
        ];
    }

    /**
     * @dataProvider phoneNumbersUnsuccessfullyProvider
     */
    public function test_should_not_validate_phone($input)
    {
        $validator = new PhoneValidator();
        $this->assertFalse($validator->validate($input));
        $this->assertEquals('Invalid phone number', $validator->getErrorMessage());
    }

    public static function phoneNumbersUnsuccessfullyProvider(): iterable
    {
        yield 'format with three places DDI' => [
            'input' => '+555(21)98765-5678',
        ];

        yield 'format with three places DDD' => [
            'input' => '(213)98765-5678',
        ];

        yield 'format with ten numbers in phone' => [
            'input' => '98765-56789',
        ];
    }
}

<?php

declare(strict_types=1);

namespace Tests\Unit\Validator;

use ChapaPhp\Domain\Validator\OneOfOptionsValidator;
use Tests\TestCase;

/**
 * @internal
 */
class OneOfOptionsValidatorTest extends TestCase
{
    public function test_should_validate_one_of_options()
    {
        $validator = new OneOfOptionsValidator();
        $options = ['option', 'select', 'checkbox', 'textinput', 'label'];
        $validator->setOptions($options);
        $this->assertTrue($validator->validate('option'));
    }

    public function test_should_not_validate_one_of_options()
    {
        $validator = new OneOfOptionsValidator();
        $options = ['option', 'select', 'checkbox', 'textinput', 'label'];
        $validator->setOptions($options);
        $this->assertFalse($validator->validate('textarea'));
        $this->assertEquals('Invalid option', $validator->getErrorMessage());
    }
}

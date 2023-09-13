<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Validator;

use ArrayObject;

class ValidatorCollectionDecorator extends Validator
{
    public function __construct(
        private Validator $validator,
        protected ArrayObject $errorMessage = new ArrayObject()
    ) {
    }

    /**
     * @param array $input
     */
    public function validate(mixed $input): bool
    {
        $this->errorMessage = new ArrayObject();
        foreach ($input as $key => $item) {
            if (!$this->validator->validate($item)) {
                $this->errorMessage->offsetSet($key, $this->validator->getErrorMessage());
            }
        }

        return 0 === $this->errorMessage->count();
    }

    public function getErrorMessage(): array
    {
        return $this->errorMessage->getArrayCopy();
    }
}

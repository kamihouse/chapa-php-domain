<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\ValueObject;

use BackedEnum;
use DateTimeImmutable;

/**
 * @template T of object
 */
interface Occurrence
{
    /**
     * @return T
     */
    public function data(): object;

    public function kind(): BackedEnum;

    public function occurred(): DateTimeImmutable;
}

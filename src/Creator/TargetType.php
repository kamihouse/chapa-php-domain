<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Creator;

/**
 * @template T of object
 */
interface TargetType
{
    /**
     * @return class-string<T>
     */
    public function targetType();
}

<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Creator;

/**
 * @template T of object
 *
 * @extends TargetType<T>
 */
interface Builder extends TargetType
{
    /**
     * @return T
     */
    public function build();
}

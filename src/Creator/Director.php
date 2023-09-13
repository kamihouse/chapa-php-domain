<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Creator;

/**
 * @template T
 * @template D
 *
 * @template-extends TargetType<T>
 */
interface Director extends TargetType
{
    /**
     * @param D $data
     *
     * @return T
     */
    public function make($data);
}

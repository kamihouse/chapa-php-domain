<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Creator;

interface Factory
{
    /**
     * @template T
     * @template D
     *
     * @param class-string<T> $target
     * @param D               $data
     *
     * @return T
     */
    public function create($target, $data);
}

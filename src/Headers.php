<?php

declare(strict_types=1);

namespace ChapaPhp\Domain;

use Ds\Collection;

/**
 * @template T
 */
interface Headers
{
    /**
     * @return Collection<T>
     */
    public function headers();
}

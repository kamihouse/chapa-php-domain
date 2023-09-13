<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Repository;

use ChapaPhp\Domain\Aggregate;
use ChapaPhp\Domain\Error\PersistenceError;

/**
 * @template T of Aggregate
 */
interface PersistenceRepository
{
    /**
     * @param T $aggregate
     */
    public function persist(Aggregate $aggregate): bool|PersistenceError;
}

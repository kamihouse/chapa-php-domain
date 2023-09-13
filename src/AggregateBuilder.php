<?php

declare(strict_types=1);

namespace ChapaPhp\Domain;

use ChapaPhp\Domain\Creator\Builder;

/**
 * @extends Builder<Aggregate>
 */
interface AggregateBuilder extends Builder
{
    public function withId(string $id): AggregateBuilder;
}

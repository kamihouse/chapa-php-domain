<?php

declare(strict_types=1);

namespace ChapaPhp\Domain;

use Ds\Collection;

interface EventStore
{
    /**
     * @return Collection<Event>
     */
    public function events(): Collection;
}

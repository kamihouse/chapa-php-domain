<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Creator;

interface Directors
{
    public function addDirector(Director $director): void;
}

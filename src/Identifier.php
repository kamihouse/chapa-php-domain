<?php

declare(strict_types=1);

namespace ChapaPhp\Domain;

/**
 * @template T
 */
interface Identifier
{
    /**
     * @return T
     */
    public function id();
}

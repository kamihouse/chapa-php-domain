<?php

declare(strict_types=1);

namespace ChapaPhp\Domain;

/**
 * @template T
 */
interface Payload
{
    /**
     * @return T
     */
    public function payload();
}

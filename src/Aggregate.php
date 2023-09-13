<?php

declare(strict_types=1);

namespace ChapaPhp\Domain;

/**
 * Aggregate class.
 *
 * @implements Identifier<string>
 */
abstract class Aggregate implements Identifier
{
    public function __construct(
        private string $id
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }
}

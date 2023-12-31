<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Specification;

interface Specification
{
    public function isSatisfiedBy(mixed $target): bool;

    public function and(Specification $specification): Specification;

    public function or(Specification $specification): Specification;

    public function not(): Specification;
}

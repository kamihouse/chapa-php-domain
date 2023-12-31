<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Specification;

class AndSpecification extends AbstractSpecification
{
    private Specification $leftSpecification;
    private Specification $rightSpecification;

    public function __construct(Specification $leftSpecification, Specification $rightSpecification)
    {
        $this->leftSpecification = $leftSpecification;
        $this->rightSpecification = $rightSpecification;
    }

    public function isSatisfiedBy(mixed $target): bool
    {
        return $this->leftSpecification->isSatisfiedBy($target) && $this->rightSpecification->isSatisfiedBy($target);
    }
}

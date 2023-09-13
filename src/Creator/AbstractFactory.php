<?php

declare(strict_types=1);

namespace ChapaPhp\Domain\Creator;

abstract class AbstractFactory implements Factory, Directors
{
    abstract public function getFactoryTargets(): iterable;
}

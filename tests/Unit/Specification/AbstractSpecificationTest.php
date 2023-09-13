<?php

declare(strict_types=1);

namespace Tests\Unit\Specification;

use ChapaPhp\Domain\Specification\AbstractSpecification;
use stdClass;
use Tests\TestCase;

/**
 * @internal
 */
class AbstractSpecificationTest extends TestCase
{
    /**
     * @test
     */
    public function should_be_able_to_create_and_satisfy_a_new_specification_with_and()
    {
        $specification = new class () extends AbstractSpecification {
            public function isSatisfiedBy($object): bool
            {
                return true;
            }
        };

        $andSpecification = $specification->and($specification);

        $this->assertTrue($andSpecification->isSatisfiedBy(new stdClass()));
    }

    /**
     * @test
     */
    public function should_be_able_to_create_and_satisfy_a_new_specification_with_or()
    {
        $specification = new class () extends AbstractSpecification {
            public function isSatisfiedBy($object): bool
            {
                return true;
            }
        };

        $orSpecification = $specification->or($specification);

        $this->assertTrue($orSpecification->isSatisfiedBy(new stdClass()));
    }

    /**
     * @test
     */
    public function should_be_able_to_create_and_satisfy_a_new_specification_with_not()
    {
        $specification = new class () extends AbstractSpecification {
            public function isSatisfiedBy($object): bool
            {
                return false;
            }
        };

        $notSpecification = $specification->not();

        $this->assertTrue($notSpecification->isSatisfiedBy(new stdClass()));
    }
}

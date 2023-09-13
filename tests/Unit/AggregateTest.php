<?php

declare(strict_types=1);

namespace Tests\Unit;

use ChapaPhp\Domain\Aggregate;
use Ds\Collection;
use Ds\Set;
use Tests\TestCase;

/**
 * @internal
 */
final class AggregateTest extends TestCase
{
    private Aggregate $aggregate;

    protected function setUp(): void
    {
        parent::setUp();

        $this->aggregate = new class ('123') extends Aggregate {
            public function events(): Collection
            {
                return new Set();
            }
        };
    }

    /**
     * @test
     */
    public function should_be_able_to_create_a_new_aggregate(): void
    {
        $this->assertInstanceOf(Aggregate::class, $this->aggregate);
    }

    /**
     * @test
     */
    public function should_be_able_to_get_the_aggregate_id(): void
    {
        $this->assertEquals('123', $this->aggregate->id());
    }
}

<?php

declare(strict_types=1);

namespace ChapaPhp\Domain;

use ChapaPhp\Domain\Creator\Builder;

/**
 * @extends Builder<Event>
 */
interface EventBuilder extends Builder
{
    /**
     * Summary of withPayload.
     */
    public function withId($id): EventBuilder;

    /**
     * Summary of withHeader.
     */
    public function withPayload($header): EventBuilder;

    /**
     * Summary of withHeaders.
     */
    public function withHeaders($headers): EventBuilder;
}

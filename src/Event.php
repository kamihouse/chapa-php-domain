<?php

declare(strict_types=1);

namespace ChapaPhp\Domain;

/**
 * @template I of string
 * @template H
 * @template P
 *
 * @implements Identifier<I>
 * @implements Headers<H>
 * @implements Payload<P>
 */
abstract class Event implements Identifier, Headers, Payload
{
}

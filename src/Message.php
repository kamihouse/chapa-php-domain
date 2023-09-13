<?php

declare(strict_types=1);

namespace ChapaPhp\Domain;

/**
 * @template H
 * @template P
 *
 * @implements Headers<H>
 * @implements Payload<P>
 */
abstract class Message implements Headers, Payload
{
}

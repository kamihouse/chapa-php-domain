<?php

declare(strict_types=1);

namespace ChapaPhp\Domain;

enum HeaderKey: string
{
    case ID = 'id';
    case CATEGORY = 'category';
    case TYPE = 'type';
    case VERSION = 'version';
    case SCHEMA = 'schema';
}

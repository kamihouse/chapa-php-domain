<?php

declare(strict_types=1);

namespace ChapaPhp\Domain;

use ChapaPhp\Domain\Creator\Builder;

class HeaderBuilder implements Builder
{
    private HeaderKey $key;
    private string $value;

    public function withKey(HeaderKey $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function withValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function build(): Header
    {
        return new Header($this->key, $this->value);
    }

    /**
     * @return string
     */
    public function targetType()
    {
        return Header::class;
    }
}

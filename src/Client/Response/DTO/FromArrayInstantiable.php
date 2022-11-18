<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Response\DTO;

interface FromArrayInstantiable
{
    /**
     * @return static
     */
    public static function fromArray(array $data): self;
}

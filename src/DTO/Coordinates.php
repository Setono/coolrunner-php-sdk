<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

final class Coordinates
{
    public float $latitude;

    public float $longitude;

    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function __toString(): string
    {
        return sprintf('%s, %s', $this->latitude, $this->longitude);
    }
}

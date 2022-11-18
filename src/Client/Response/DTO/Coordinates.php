<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Response\DTO;

final class Coordinates
{
    /** @readonly */
    public float $latitude;

    /** @readonly */
    public float $longitude;

    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public static function fromArray(array $data): self
    {
        return new self($data['latitude'], $data['longitude']);
    }
}

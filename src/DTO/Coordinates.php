<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

use Psl\Type;

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
        $data = Type\shape([
            'latitude' => Type\float(),
            'longitude' => Type\float(),
        ])->assert($data);

        return new self($data['latitude'], $data['longitude']);
    }

    public function __toString(): string
    {
        return sprintf('%s, %s', $this->latitude, $this->longitude);
    }
}

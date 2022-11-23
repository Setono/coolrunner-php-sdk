<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

use Psl\Type;
use Setono\CoolRunner\Exception\InvalidDataException;

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
        $specification = Type\shape([
            'latitude' => Type\float(),
            'longitude' => Type\float(),
        ]);

        try {
            $data = $specification->coerce($data);
        } catch (Type\Exception\CoercionException $e) {
            throw InvalidDataException::fromCoercionException($e, $specification, $data);
        }

        return new self($data['latitude'], $data['longitude']);
    }

    public function __toString(): string
    {
        return sprintf('%s, %s', $this->latitude, $this->longitude);
    }
}

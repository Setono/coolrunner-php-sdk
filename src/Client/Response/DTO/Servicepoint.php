<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Response\DTO;

final class Servicepoint implements FromArrayInstantiable
{
    /** @readonly */
    public string $id;

    /** @readonly */
    public string $name;

    /**
     * todo figure out what this distance is? Meters probably?
     *
     * @readonly
     */
    public ?int $distance;

    /** @readonly */
    public Address $address;

    /** @readonly */
    public Coordinates $coordinates;

    /** @readonly */
    public OpeningHours $openingHours;

    public function __construct(
        string $id,
        string $name,
        ?int $distance,
        Address $address,
        Coordinates $coordinates,
        OpeningHours $openingHours
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->distance = $distance;
        $this->address = $address;
        $this->coordinates = $coordinates;
        $this->openingHours = $openingHours;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['distance'] ?? null,
            Address::fromArray($data['address']),
            Coordinates::fromArray($data['coordinates']),
            OpeningHours::fromArray($data['opening_hours'])
        );
    }
}

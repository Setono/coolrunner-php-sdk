<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

use Psl\Type;

final class Servicepoint
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
        $data = Type\shape([
            'id' => Type\string(),
            'name' => Type\string(),
            'distance' => Type\optional(Type\int()),
            'address' => Type\shape([], true),
            'coordinates' => Type\shape([], true),
            'opening_hours' => Type\shape([], true),
        ])->assert($data);

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

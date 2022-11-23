<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

final class Servicepoint
{
    public string $id;

    public string $name;

    /**
     * todo figure out what this distance is? Meters probably?
     */
    public ?int $distance;

    public Address $address;

    public Coordinates $coordinates;

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
}

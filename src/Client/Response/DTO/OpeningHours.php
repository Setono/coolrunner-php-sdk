<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Response\DTO;

use Setono\CoolRunner\Client\Response\DTO\OpeningHours\Day;

final class OpeningHours
{
    /** @readonly */
    public Day $monday;

    /** @readonly */
    public Day $tuesday;

    /** @readonly */
    public Day $wednesday;

    /** @readonly */
    public Day $thursday;

    /** @readonly */
    public Day $friday;

    /** @readonly */
    public Day $saturday;

    /** @readonly */
    public Day $sunday;

    public function __construct(
        Day $monday,
        Day $tuesday,
        Day $wednesday,
        Day $thursday,
        Day $friday,
        Day $saturday,
        Day $sunday
    ) {
        $this->monday = $monday;
        $this->tuesday = $tuesday;
        $this->wednesday = $wednesday;
        $this->thursday = $thursday;
        $this->friday = $friday;
        $this->saturday = $saturday;
        $this->sunday = $sunday;
    }


    public static function fromArray(array $data): self
    {
        return new self(
            Day::fromArray($data['monday']),
            Day::fromArray($data['tuesday']),
            Day::fromArray($data['wednesday']),
            Day::fromArray($data['thursday']),
            Day::fromArray($data['friday']),
            Day::fromArray($data['saturday']),
            Day::fromArray($data['sunday']),
        );
    }
}

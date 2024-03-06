<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

use Setono\CoolRunner\DTO\OpeningHours\Day;

final class OpeningHours
{
    public Day $monday;

    public Day $tuesday;

    public Day $wednesday;

    public Day $thursday;

    public Day $friday;

    public Day $saturday;

    public Day $sunday;

    public function __construct(
        Day $monday,
        Day $tuesday,
        Day $wednesday,
        Day $thursday,
        Day $friday,
        Day $saturday,
        Day $sunday,
    ) {
        $this->monday = $monday;
        $this->tuesday = $tuesday;
        $this->wednesday = $wednesday;
        $this->thursday = $thursday;
        $this->friday = $friday;
        $this->saturday = $saturday;
        $this->sunday = $sunday;
    }
}

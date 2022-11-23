<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO\OpeningHours;

final class Day
{
    public Time $from;

    public Time $to;

    public function __construct(Time $from, Time $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public function __toString(): string
    {
        return sprintf('%s - %s', (string) $this->from, (string) $this->to);
    }
}

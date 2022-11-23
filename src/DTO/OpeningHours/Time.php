<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO\OpeningHours;

final class Time
{
    public int $hours;

    public int $minutes;

    public function __construct(int $hours, int $minutes)
    {
        $this->hours = $hours;
        $this->minutes = $minutes;
    }

    public static function fromString(?string $value): self
    {
        if (null === $value || '' === $value) {
            return new self(0, 0);
        }

        [$hours, $minutes] = explode(':', $value);

        return new self((int) $hours, (int) $minutes);
    }

    public function __toString(): string
    {
        return sprintf('%02d:%02d', $this->hours, $this->minutes);
    }
}

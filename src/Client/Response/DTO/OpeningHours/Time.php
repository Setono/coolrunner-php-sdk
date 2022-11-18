<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Response\DTO\OpeningHours;

final class Time
{
    /** @readonly */
    public int $hours;

    /** @readonly */
    public int $minutes;

    public function __construct(int $hours, int $minutes)
    {
        $this->hours = $hours;
        $this->minutes = $minutes;
    }

    public static function fromString(?string $value): self
    {
        if(null === $value || '' === $value) {
            return new self(0, 0);
        }

        [$hours, $minutes] = explode(':', $value);

        return new self($hours, $minutes);
    }

    public function __toString(): string
    {
        return $this->hours . ':' . $this->minutes;
    }
}

<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO\OpeningHours;

use Psl\Type;

final class Day
{
    public Time $from;

    public Time $to;

    public function __construct(Time $from, Time $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    public static function fromArray(array $data): self
    {
        $data = Type\shape([
            'from' => Type\string(),
            'to' => Type\string(),
        ])->assert($data);

        return new self(Time::fromString($data['from']), Time::fromString($data['to']));
    }

    public function isOpen(): bool
    {
        // if both to and from are 00:00 then we consider that to be closed
        if (0 === $this->from->hours && 0 === $this->from->minutes && 0 === $this->to->hours && 0 === $this->to->minutes) {
            return false;
        }

        $from = (int) sprintf('%d%d', $this->from->hours, $this->from->minutes);
        $to = (int) sprintf('%d%d', $this->to->hours, $this->to->minutes);

        // this is a small hack to ease the time comparison. If to is equal to 00:00 then we convert that to 24:00
        if (0 === $this->to->hours && 0 === $this->to->minutes) {
            $to = 2400;
        }

        return $to > $from;
    }

    public function __toString(): string
    {
        return sprintf('%s - %s', (string) $this->from, (string) $this->to);
    }
}

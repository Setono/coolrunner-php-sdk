<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Response\DTO\OpeningHours;

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
        return new self(Time::fromString($data['from']), Time::fromString($data['to']));
    }

    public function isOpen(): bool
    {
        if($this->to->hours < $this->from->hours) {
            return false;
        }

        if($this->to->hours > $this->from->hours) {
            return true;
        }


    }

    public function __toString(): string
    {
        return sprintf('%s - %s', (string) $this->from, (string) $this->to);
    }
}

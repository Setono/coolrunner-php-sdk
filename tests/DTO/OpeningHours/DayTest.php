<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO\OpeningHours;

use PHPUnit\Framework\TestCase;

class DayTest extends TestCase
{
    /**
     * @test
     */
    public function it_stringifies(): void
    {
        $day = new Day(new Time(10, 0), new Time(11, 0));

        self::assertSame('10:00 - 11:00', (string) $day);
    }
}

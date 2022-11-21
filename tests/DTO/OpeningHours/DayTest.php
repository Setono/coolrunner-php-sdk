<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO\OpeningHours;

use PHPUnit\Framework\TestCase;

class DayTest extends TestCase
{
    /**
     * @test
     * @dataProvider getOpeningHours
     */
    public function it_handles_opening_hours(array $openingHours, bool $open): void
    {
        self::assertSame($open, Day::fromArray($openingHours)->isOpen());
    }

    /**
     * @return \Generator<array-key, array{0: array, 1: bool}>
     */
    public function getOpeningHours(): \Generator
    {
        yield [['from' => '10:00', 'to' => '17:00'], true];
        yield [['from' => '10:00', 'to' => '00:00'], true];
        yield [['from' => '00:00', 'to' => '00:00'], false];
        yield [['from' => '18:00', 'to' => '15:00'], false];
    }

    public function it_stringifies(): void
    {
        $day = Day::fromArray([
            'from' => '10:00',
            'to' => '11:00',
        ]);

        self::assertSame('10:00 - 11:00', (string) $day);
    }
}

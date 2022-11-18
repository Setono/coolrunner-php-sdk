<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO\OpeningHours;

use PHPUnit\Framework\TestCase;

/**
 * @covers \Setono\CoolRunner\DTO\OpeningHours\Time
 */
final class TimeTest extends TestCase
{
    /**
     * @test
     */
    public function it_handles_null_input(): void
    {
        $time = Time::fromString(null);
        self::assertSame(0, $time->hours);
        self::assertSame(0, $time->minutes);
    }
}

<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

use PHPUnit\Framework\TestCase;

/**
 * @covers \Setono\CoolRunner\DTO\Coordinates
 */
final class CoordinatesTest extends TestCase
{
    /**
     * @test
     */
    public function it_stringifies(): void
    {
        $coordinates = Coordinates::fromArray([
            'latitude' => 57.123,
            'longitude' => 98.31,
        ]);

        self::assertSame('57.123, 98.31', (string) $coordinates);
    }
}

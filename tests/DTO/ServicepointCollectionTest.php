<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

use PHPUnit\Framework\TestCase;
use Setono\CoolRunner\DTO\OpeningHours\Day;
use Setono\CoolRunner\DTO\OpeningHours\Time;

/**
 * @covers \Setono\CoolRunner\DTO\ServicepointCollection
 */
final class ServicepointCollectionTest extends TestCase
{
    /**
     * @test
     */
    public function it_has_collection_traits(): void
    {
        $day = new Day(new Time(0, 0), new Time(1, 0));
        $servicepoint = new Servicepoint(
            'id',
            'name',
            123,
            new Address('street', '1234', 'city', 'DK'),
            new Coordinates(123.4, 123.4),
            new OpeningHours($day, $day, $day, $day, $day, $day, $day)
        );
        $collection = new ServicepointCollection([$servicepoint]);

        self::assertCount(1, $collection);
        self::assertFalse($collection->isEmpty());

        foreach ($collection as $item) {
            self::assertSame($servicepoint, $item);
        }
    }
}

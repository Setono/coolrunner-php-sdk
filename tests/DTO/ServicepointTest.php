<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

use PHPUnit\Framework\TestCase;

final class ServicepointTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_with_correct_input(): void
    {
        $servicepoint = Servicepoint::fromArray([
            'id' => '1234',
            'name' => 'Pickup point',
            'distance' => 567,
            'address' => [
                'street' => 'Highway 1',
                'zip_code' => '31337',
                'city' => 'Miami',
                'country_code' => 'US',
            ],
            'coordinates' => [
                'latitude' => 57.123,
                'longitude' => 68.123,
            ],
            'opening_hours' => [
                'monday' => [
                    'from' => '08:00',
                    'to' => '09:00',
                ],
                'tuesday' => [
                    'from' => '10:00',
                    'to' => '11:00',
                ],
                'wednesday' => [
                    'from' => '12:00',
                    'to' => '13:00',
                ],
                'thursday' => [
                    'from' => '14:00',
                    'to' => '15:00',
                ],
                'friday' => [
                    'from' => '16:00',
                    'to' => '17:00',
                ],
                'saturday' => [
                    'from' => '18:00',
                    'to' => '19:00',
                ],
                'sunday' => [
                    'from' => '20:00',
                    'to' => '21:00',
                ],
            ],
        ]);

        // asserting base properties
        self::assertSame('1234', $servicepoint->id);
        self::assertSame('Pickup point', $servicepoint->name);
        self::assertSame(567, $servicepoint->distance);

        // asserting address (nested object)
        self::assertSame('Highway 1', $servicepoint->address->street);
        self::assertSame('31337', $servicepoint->address->zipCode);
        self::assertSame('Miami', $servicepoint->address->city);
        self::assertSame('US', $servicepoint->address->countryCode);

        // asserting coordinates (nested object)
        self::assertSame(57.123, $servicepoint->coordinates->latitude);
        self::assertSame(68.123, $servicepoint->coordinates->longitude);

        // asserting opening hours (nested object)
        self::assertSame('08:00', (string) $servicepoint->openingHours->monday->from);
        self::assertSame('09:00', (string) $servicepoint->openingHours->monday->to);

        self::assertSame('10:00', (string) $servicepoint->openingHours->tuesday->from);
        self::assertSame('11:00', (string) $servicepoint->openingHours->tuesday->to);

        self::assertSame('12:00', (string) $servicepoint->openingHours->wednesday->from);
        self::assertSame('13:00', (string) $servicepoint->openingHours->wednesday->to);

        self::assertSame('14:00', (string) $servicepoint->openingHours->thursday->from);
        self::assertSame('15:00', (string) $servicepoint->openingHours->thursday->to);

        self::assertSame('16:00', (string) $servicepoint->openingHours->friday->from);
        self::assertSame('17:00', (string) $servicepoint->openingHours->friday->to);

        self::assertSame('18:00', (string) $servicepoint->openingHours->saturday->from);
        self::assertSame('19:00', (string) $servicepoint->openingHours->saturday->to);

        self::assertSame('20:00', (string) $servicepoint->openingHours->sunday->from);
        self::assertSame('21:00', (string) $servicepoint->openingHours->sunday->to);
    }
}

<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Endpoint;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\PhpUnit\ProphecyTrait;
use Psr\Http\Client\ClientInterface as HttpClientInterface;
use Setono\CoolRunner\Client\Client;
use Setono\CoolRunner\Client\ClientInterface;

final class ServicepointsEndpointTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @test
     */
    public function it_finds_service_point_by_id(): void
    {
        $client = $this->createClient(<<<JSON
{"id":"97891","name":"Shell 7-Eleven N\u00f8rresundby","address":{"street":"\u00d8stergade 27-29","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0588,"longitude":9.92832},"opening_hours":{"monday":{"from":"06:00","to":"23:00"},"tuesday":{"from":"06:00","to":"23:00"},"wednesday":{"from":"06:00","to":"23:00"},"thursday":{"from":"06:00","to":"23:00"},"friday":{"from":"06:00","to":"23:00"},"saturday":{"from":"07:00","to":"23:00"},"sunday":{"from":"07:00","to":"23:00"}}}
JSON);
        $servicepoint = $client->servicepoints()->findById('gls', '97891');

        self::assertNotNull($servicepoint);

        // asserting base properties
        self::assertSame('97891', $servicepoint->id);
        self::assertSame('Shell 7-Eleven Nørresundby', $servicepoint->name);
        self::assertNull($servicepoint->distance);

        // asserting address (nested object)
        self::assertSame('Østergade 27-29', $servicepoint->address->street);
        self::assertSame('9400', $servicepoint->address->zipCode);
        self::assertSame('Nørresundby', $servicepoint->address->city);
        self::assertSame('DK', $servicepoint->address->countryCode);

        // asserting coordinates (nested object)
        self::assertSame(57.0588, $servicepoint->coordinates->latitude);
        self::assertSame(9.92832, $servicepoint->coordinates->longitude);

        // asserting opening hours (nested object)
        self::assertSame('06:00', (string) $servicepoint->openingHours->monday->from);
        self::assertSame('23:00', (string) $servicepoint->openingHours->monday->to);

        self::assertSame('06:00', (string) $servicepoint->openingHours->tuesday->from);
        self::assertSame('23:00', (string) $servicepoint->openingHours->tuesday->to);

        self::assertSame('06:00', (string) $servicepoint->openingHours->wednesday->from);
        self::assertSame('23:00', (string) $servicepoint->openingHours->wednesday->to);

        self::assertSame('06:00', (string) $servicepoint->openingHours->thursday->from);
        self::assertSame('23:00', (string) $servicepoint->openingHours->thursday->to);

        self::assertSame('06:00', (string) $servicepoint->openingHours->friday->from);
        self::assertSame('23:00', (string) $servicepoint->openingHours->friday->to);

        self::assertSame('07:00', (string) $servicepoint->openingHours->saturday->from);
        self::assertSame('23:00', (string) $servicepoint->openingHours->saturday->to);

        self::assertSame('07:00', (string) $servicepoint->openingHours->sunday->from);
        self::assertSame('23:00', (string) $servicepoint->openingHours->sunday->to);
    }

    /**
     * @test
     */
    public function it_returns_if_no_service_point_is_found(): void
    {
        $client = $this->createClient('{}');

        $servicepoint = $client->servicepoints()->findById('gls', '97891');

        self::assertNull($servicepoint);
    }

    private function createClient(string $returnedJson): ClientInterface
    {
        $httpClient = $this->prophesize(HttpClientInterface::class);
        $httpClient->sendRequest(Argument::any())->willReturn(new Response(200, [], $returnedJson));
        $client = new Client('username', 'token');
        $client->setHttpClient($httpClient->reveal());

        return $client;
    }
}

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
use Setono\CoolRunner\DTO\Servicepoint;

final class ServicepointsEndpointTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @test
     */
    public function it_finds_service_points_by_address(): void
    {
        $client = $this->createClient(<<<JSON
{"servicepoints":[{"id":"95248","name":"Min K\u00f8bmand N\u00f8rre Uttrup","distance":1253,"address":{"street":"N\u00f8rre Uttrup Torv 15","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0693,"longitude":9.94694},"opening_hours":{"monday":{"from":"06:30","to":"21:00"},"tuesday":{"from":"06:30","to":"21:00"},"wednesday":{"from":"06:30","to":"21:00"},"thursday":{"from":"06:30","to":"21:00"},"friday":{"from":"06:30","to":"21:00"},"saturday":{"from":"06:30","to":"21:00"},"sunday":{"from":"06:30","to":"21:00"}}},{"id":"97891","name":"Shell 7-Eleven N\u00f8rresundby","distance":1352,"address":{"street":"\u00d8stergade 27-29","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0588,"longitude":9.92832},"opening_hours":{"monday":{"from":"06:00","to":"23:00"},"tuesday":{"from":"06:00","to":"23:00"},"wednesday":{"from":"06:00","to":"23:00"},"thursday":{"from":"06:00","to":"23:00"},"friday":{"from":"06:00","to":"23:00"},"saturday":{"from":"07:00","to":"23:00"},"sunday":{"from":"07:00","to":"23:00"}}},{"id":"99215","name":"Next-Data.Dk","distance":1457,"address":{"street":"\u00d8sterbrogade 79","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0585,"longitude":9.92657},"opening_hours":{"monday":{"from":"10:00","to":"17:30"},"tuesday":{"from":"10:00","to":"17:30"},"wednesday":{"from":"10:00","to":"17:30"},"thursday":{"from":"10:00","to":"17:30"},"friday":{"from":"10:00","to":"17:30"},"saturday":{"from":"10:00","to":"13:00"},"sunday":{"from":"","to":""}}},{"id":"99190","name":"Solsidens Maler Og Farvehandel","distance":1476,"address":{"street":"Hj\u00f8rringvej 80","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0714,"longitude":9.94799},"opening_hours":{"monday":{"from":"09:00","to":"17:30"},"tuesday":{"from":"09:00","to":"17:30"},"wednesday":{"from":"09:00","to":"17:30"},"thursday":{"from":"09:00","to":"17:30"},"friday":{"from":"09:00","to":"17:30"},"saturday":{"from":"09:30","to":"13:00"},"sunday":{"from":"","to":""}}},{"id":"96954","name":"N\u00e6rk\u00f8b N\u00f8rresundby","distance":1684,"address":{"street":"Forbindelsesvejen 115","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0706,"longitude":9.93462},"opening_hours":{"monday":{"from":"07:00","to":"22:00"},"tuesday":{"from":"07:00","to":"22:00"},"wednesday":{"from":"07:00","to":"22:00"},"thursday":{"from":"07:00","to":"22:00"},"friday":{"from":"07:00","to":"22:00"},"saturday":{"from":"07:00","to":"22:00"},"sunday":{"from":"07:00","to":"22:00"}}},{"id":"99662","name":"SuperBrugsen N\u00f8rresundby","distance":1708,"address":{"street":"Havnegade 10","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0565,"longitude":9.92259},"opening_hours":{"monday":{"from":"08:00","to":"21:00"},"tuesday":{"from":"08:00","to":"21:00"},"wednesday":{"from":"08:00","to":"21:00"},"thursday":{"from":"08:00","to":"21:00"},"friday":{"from":"08:00","to":"21:00"},"saturday":{"from":"08:00","to":"21:00"},"sunday":{"from":"08:00","to":"21:00"}}},{"id":"96612","name":"GLS PakkeShop","distance":3472,"address":{"street":"Hedelund 17","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0887,"longitude":9.96251},"opening_hours":{"monday":{"from":"08:00","to":"18:00"},"tuesday":{"from":"08:00","to":"18:00"},"wednesday":{"from":"08:00","to":"18:00"},"thursday":{"from":"08:00","to":"18:00"},"friday":{"from":"08:00","to":"18:00"},"saturday":{"from":"08:00","to":"14:00"},"sunday":{"from":"","to":""}}},{"id":"99225","name":"Kvickly N\u00f8rresundby","distance":3794,"address":{"street":"Loftbrovej 17","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.089,"longitude":9.97748},"opening_hours":{"monday":{"from":"08:00","to":"20:00"},"tuesday":{"from":"08:00","to":"20:00"},"wednesday":{"from":"08:00","to":"20:00"},"thursday":{"from":"08:00","to":"20:00"},"friday":{"from":"08:00","to":"20:00"},"saturday":{"from":"08:00","to":"20:00"},"sunday":{"from":"08:00","to":"20:00"}}},{"id":"97037","name":"Kosmos Renew","distance":4012,"address":{"street":"Lufthavnsvej 3","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0733,"longitude":9.89047},"opening_hours":{"monday":{"from":"08:00","to":"17:00"},"tuesday":{"from":"08:00","to":"17:00"},"wednesday":{"from":"08:00","to":"17:00"},"thursday":{"from":"08:00","to":"17:00"},"friday":{"from":"08:00","to":"16:00"},"saturday":{"from":"","to":""},"sunday":{"from":"","to":""}}},{"id":"95397","name":"Shell 7-Eleven Vodskov","distance":6605,"address":{"street":"Vodskovvej 16","zip_code":"9310","city":"Vodskov","country_code":"DK"},"coordinates":{"latitude":57.1023,"longitude":10.0236},"opening_hours":{"monday":{"from":"06:00","to":"23:00"},"tuesday":{"from":"06:00","to":"23:00"},"wednesday":{"from":"06:00","to":"23:00"},"thursday":{"from":"06:00","to":"23:00"},"friday":{"from":"06:00","to":"23:00"},"saturday":{"from":"07:00","to":"23:00"},"sunday":{"from":"07:00","to":"23:00"}}}]}
JSON);
        $servicepoints = $client->servicepoints()->find('gls', 'DK', 'Stigsborgvej 60 4. th.', '9400', 'Nørresundby', 10);

        self::assertCount(10, $servicepoints);

        foreach ($servicepoints as $servicepoint) {
            self::assertInstanceOf(Servicepoint::class, $servicepoint);
        }
    }

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
    public function it_returns_null_if_no_service_point_is_found(): void
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

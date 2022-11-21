<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Setono\CoolRunner\DTO\Collection
 */
final class CollectionTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_from_response(): void
    {
        $response = new Response(
            200,
            [],
            <<<JSON
{"servicepoints":[{"id":"95248","name":"Min K\u00f8bmand N\u00f8rre Uttrup","distance":1253,"address":{"street":"N\u00f8rre Uttrup Torv 15","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0693,"longitude":9.94694},"opening_hours":{"monday":{"from":"06:30","to":"21:00"},"tuesday":{"from":"06:30","to":"21:00"},"wednesday":{"from":"06:30","to":"21:00"},"thursday":{"from":"06:30","to":"21:00"},"friday":{"from":"06:30","to":"21:00"},"saturday":{"from":"06:30","to":"21:00"},"sunday":{"from":"06:30","to":"21:00"}}},{"id":"97891","name":"Shell 7-Eleven N\u00f8rresundby","distance":1352,"address":{"street":"\u00d8stergade 27-29","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0588,"longitude":9.92832},"opening_hours":{"monday":{"from":"06:00","to":"23:00"},"tuesday":{"from":"06:00","to":"23:00"},"wednesday":{"from":"06:00","to":"23:00"},"thursday":{"from":"06:00","to":"23:00"},"friday":{"from":"06:00","to":"23:00"},"saturday":{"from":"07:00","to":"23:00"},"sunday":{"from":"07:00","to":"23:00"}}},{"id":"99215","name":"Next-Data.Dk","distance":1457,"address":{"street":"\u00d8sterbrogade 79","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0585,"longitude":9.92657},"opening_hours":{"monday":{"from":"10:00","to":"17:30"},"tuesday":{"from":"10:00","to":"17:30"},"wednesday":{"from":"10:00","to":"17:30"},"thursday":{"from":"10:00","to":"17:30"},"friday":{"from":"10:00","to":"17:30"},"saturday":{"from":"10:00","to":"13:00"},"sunday":{"from":"","to":""}}},{"id":"99190","name":"Solsidens Maler Og Farvehandel","distance":1476,"address":{"street":"Hj\u00f8rringvej 80","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0714,"longitude":9.94799},"opening_hours":{"monday":{"from":"09:00","to":"17:30"},"tuesday":{"from":"09:00","to":"17:30"},"wednesday":{"from":"09:00","to":"17:30"},"thursday":{"from":"09:00","to":"17:30"},"friday":{"from":"09:00","to":"17:30"},"saturday":{"from":"09:30","to":"13:00"},"sunday":{"from":"","to":""}}},{"id":"96954","name":"N\u00e6rk\u00f8b N\u00f8rresundby","distance":1684,"address":{"street":"Forbindelsesvejen 115","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0706,"longitude":9.93462},"opening_hours":{"monday":{"from":"07:00","to":"22:00"},"tuesday":{"from":"07:00","to":"22:00"},"wednesday":{"from":"07:00","to":"22:00"},"thursday":{"from":"07:00","to":"22:00"},"friday":{"from":"07:00","to":"22:00"},"saturday":{"from":"07:00","to":"22:00"},"sunday":{"from":"07:00","to":"22:00"}}},{"id":"99662","name":"SuperBrugsen N\u00f8rresundby","distance":1708,"address":{"street":"Havnegade 10","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0565,"longitude":9.92259},"opening_hours":{"monday":{"from":"08:00","to":"21:00"},"tuesday":{"from":"08:00","to":"21:00"},"wednesday":{"from":"08:00","to":"21:00"},"thursday":{"from":"08:00","to":"21:00"},"friday":{"from":"08:00","to":"21:00"},"saturday":{"from":"08:00","to":"21:00"},"sunday":{"from":"08:00","to":"21:00"}}},{"id":"96612","name":"GLS PakkeShop","distance":3472,"address":{"street":"Hedelund 17","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0887,"longitude":9.96251},"opening_hours":{"monday":{"from":"08:00","to":"18:00"},"tuesday":{"from":"08:00","to":"18:00"},"wednesday":{"from":"08:00","to":"18:00"},"thursday":{"from":"08:00","to":"18:00"},"friday":{"from":"08:00","to":"18:00"},"saturday":{"from":"08:00","to":"14:00"},"sunday":{"from":"","to":""}}},{"id":"99225","name":"Kvickly N\u00f8rresundby","distance":3794,"address":{"street":"Loftbrovej 17","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.089,"longitude":9.97748},"opening_hours":{"monday":{"from":"08:00","to":"20:00"},"tuesday":{"from":"08:00","to":"20:00"},"wednesday":{"from":"08:00","to":"20:00"},"thursday":{"from":"08:00","to":"20:00"},"friday":{"from":"08:00","to":"20:00"},"saturday":{"from":"08:00","to":"20:00"},"sunday":{"from":"08:00","to":"20:00"}}},{"id":"97037","name":"Kosmos Renew","distance":4012,"address":{"street":"Lufthavnsvej 3","zip_code":"9400","city":"N\u00f8rresundby","country_code":"DK"},"coordinates":{"latitude":57.0733,"longitude":9.89047},"opening_hours":{"monday":{"from":"08:00","to":"17:00"},"tuesday":{"from":"08:00","to":"17:00"},"wednesday":{"from":"08:00","to":"17:00"},"thursday":{"from":"08:00","to":"17:00"},"friday":{"from":"08:00","to":"16:00"},"saturday":{"from":"","to":""},"sunday":{"from":"","to":""}}},{"id":"95397","name":"Shell 7-Eleven Vodskov","distance":6605,"address":{"street":"Vodskovvej 16","zip_code":"9310","city":"Vodskov","country_code":"DK"},"coordinates":{"latitude":57.1023,"longitude":10.0236},"opening_hours":{"monday":{"from":"06:00","to":"23:00"},"tuesday":{"from":"06:00","to":"23:00"},"wednesday":{"from":"06:00","to":"23:00"},"thursday":{"from":"06:00","to":"23:00"},"friday":{"from":"06:00","to":"23:00"},"saturday":{"from":"07:00","to":"23:00"},"sunday":{"from":"07:00","to":"23:00"}}}]}
JSON
        );
        $collection = Collection::fromResponse($response, Servicepoint::class);

        self::assertCount(10, $collection);

        foreach ($collection as $servicepoint) {
            self::assertInstanceOf(Servicepoint::class, $servicepoint);
        }
    }
}

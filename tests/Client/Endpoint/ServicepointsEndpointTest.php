<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Endpoint;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Setono\CoolRunner\Client\ClientInterface;

final class ServicepointsEndpointTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @test
     */
    public function it_gets_correct_url_with_find(): void
    {
        $client = $this->prophesize(ClientInterface::class);
        $client->get('servicepoints/gls?country_code=DK&street=Vesterbro 21&zip_code=9000&city=Aalborg&limit=10')->willReturn(new Response())->shouldBeCalledOnce();
        $endpoint = new ServicepointsEndpoint($client->reveal());
        $endpoint->find('gls', 'DK', 'Vesterbro 21', '9000', 'Aalborg', 10);
    }

    /**
     * @test
     */
    public function it_gets_correct_url_with_find_by_id(): void
    {
        $client = $this->prophesize(ClientInterface::class);
        $client->get('servicepoints/gls/ID123')->willReturn(new Response())->shouldBeCalledOnce();
        $endpoint = new ServicepointsEndpoint($client->reveal());
        $endpoint->findById('gls', 'ID123');
    }
}

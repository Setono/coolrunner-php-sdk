<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Endpoint;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Setono\CoolRunner\Client\ClientInterface;

final class ProductsEndpointTest extends TestCase
{
    use ProphecyTrait;

    /**
     * @test
     */
    public function it_gets_correct_url_with_find(): void
    {
        $client = $this->prophesize(ClientInterface::class);
        $client->get('products/DK')->willReturn(new Response())->shouldBeCalledOnce();
        $endpoint = new ProductsEndpoint($client->reveal());
        $endpoint->find('DK');
    }
}

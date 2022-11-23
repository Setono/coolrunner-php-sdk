<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Endpoint;

use Psr\Http\Message\ResponseInterface;

final class ProductsEndpoint extends Endpoint implements ProductsEndpointInterface
{
    public function find(string $countryCode): ResponseInterface
    {
        return $this->client->get(sprintf('products/%s', $countryCode));
    }
}

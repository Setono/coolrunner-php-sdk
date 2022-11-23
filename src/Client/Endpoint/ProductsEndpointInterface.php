<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Endpoint;

use Psr\Http\Message\ResponseInterface;

interface ProductsEndpointInterface extends EndpointInterface
{
    /**
     * Returns the shipping products for a given country
     */
    public function find(string $countryCode): ResponseInterface;
}

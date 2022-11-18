<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Endpoint;

use Setono\CoolRunner\Client\Response\ResponseInterface;

interface ServicepointsEndpointInterface extends EndpointInterface
{
    public function find(
        string $carrier,
        string $countryCode,
        string $street,
        string $zipCode,
        string $city,
        int $limit = 10
    ): ResponseInterface;

    public function findById(string $carrier, string $id): ResponseInterface;
}

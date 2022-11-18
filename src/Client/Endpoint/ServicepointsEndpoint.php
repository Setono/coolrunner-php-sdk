<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Endpoint;

use Setono\CoolRunner\Client\Response\ResponseInterface;

final class ServicepointsEndpoint extends Endpoint implements ServicepointsEndpointInterface
{
    public function find(
        string $carrier,
        string $countryCode,
        string $street,
        string $zipCode,
        string $city,
        int $limit = 10
    ): ResponseInterface {
        return $this->client->get(sprintf(
            'servicepoints/%s?country_code=%s&street=%s&zip_code=%s&city=%s&limit=%d',
            $carrier,
            $countryCode,
            $street,
            $zipCode,
            $city,
            $limit
        ));
    }

    public function findById(string $carrier, string $id): ResponseInterface
    {
        // TODO: Implement findById() method.
    }
}

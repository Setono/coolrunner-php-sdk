<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Endpoint;

use Setono\CoolRunner\DTO\Servicepoint;
use Setono\CoolRunner\DTO\ServicepointCollection;

interface ServicepointsEndpointInterface extends EndpointInterface
{
    /**
     * If no servicepoints exists with the given criteria the returned collection will be empty
     */
    public function find(
        string $carrier,
        string $countryCode,
        string $street,
        string $zipCode,
        string $city,
        int $limit = 10,
    ): ServicepointCollection;

    /**
     * Returns null if a servicepoint from the given carrier and with the given id does not exist
     */
    public function findById(string $carrier, string $id): ?Servicepoint;
}

<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Endpoint;

use CuyZ\Valinor\Mapper\MappingError;
use Setono\CoolRunner\DTO\Servicepoint;
use Setono\CoolRunner\DTO\ServicepointCollection;

final class ServicepointsEndpoint extends Endpoint implements ServicepointsEndpointInterface
{
    public function find(
        string $carrier,
        string $countryCode,
        string $street,
        string $zipCode,
        string $city,
        int $limit = 10
    ): ServicepointCollection {
        $response = $this->client->get(sprintf(
            'servicepoints/%s?country_code=%s&street=%s&zip_code=%s&city=%s&limit=%d',
            $carrier,
            $countryCode,
            $street,
            $zipCode,
            $city,
            $limit
        ));

        return $this->mapperBuilder->mapper()
            ->map(ServicepointCollection::class, $this->createSourceFromResponse($response));
    }

    public function findById(string $carrier, string $id): ?Servicepoint
    {
        $response = $this->client->get(sprintf('servicepoints/%s/%s', $carrier, $id));

        try {
            return $this->mapperBuilder->mapper()
                ->map(Servicepoint::class, $this->createSourceFromResponse($response));
        } catch (MappingError $e) {
            return null;
        }
    }
}

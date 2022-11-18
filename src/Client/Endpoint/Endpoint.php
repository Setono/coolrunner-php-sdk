<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Endpoint;

use Setono\CoolRunner\Client\ClientInterface;

abstract class Endpoint implements EndpointInterface
{
    protected ClientInterface $client;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
}

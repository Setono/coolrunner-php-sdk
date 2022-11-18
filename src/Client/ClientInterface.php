<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client;

use Psr\Http\Message\ResponseInterface;
use Setono\CoolRunner\Client\Endpoint\ServicepointsEndpointInterface;

interface ClientInterface
{
    public function get(string $uri): ResponseInterface;

    public function servicepoints(): ServicepointsEndpointInterface;
}

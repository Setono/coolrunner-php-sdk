<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client;

use Setono\CoolRunner\Client\Endpoint\ServicepointsEndpointInterface;
use Setono\CoolRunner\Client\Response\ResponseInterface;

interface ClientInterface
{
    public function get(string $uri): ResponseInterface;

    public function servicepoints(): ServicepointsEndpointInterface;
}

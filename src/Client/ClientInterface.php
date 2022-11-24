<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Setono\CoolRunner\Client\Endpoint\ProductsEndpointInterface;
use Setono\CoolRunner\Client\Endpoint\ServicepointsEndpointInterface;

interface ClientInterface
{
    /**
     * Returns the last request sent to the API if any requests has been sent
     */
    public function getLastRequest(): ?RequestInterface;

    /**
     * Returns the last response from the API, if any responses has been received
     */
    public function getLastResponse(): ?ResponseInterface;

    public function get(string $uri): ResponseInterface;

    public function products(): ProductsEndpointInterface;

    public function servicepoints(): ServicepointsEndpointInterface;
}

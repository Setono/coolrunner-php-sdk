<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Client\ClientInterface as HttpClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Setono\CoolRunner\Client\Endpoint\ProductsEndpoint;
use Setono\CoolRunner\Client\Endpoint\ProductsEndpointInterface;
use Setono\CoolRunner\Client\Endpoint\ServicepointsEndpoint;
use Setono\CoolRunner\Client\Endpoint\ServicepointsEndpointInterface;

final class Client implements ClientInterface
{
    private ?ProductsEndpointInterface $productsEndpoint = null;

    private ?ServicepointsEndpointInterface $servicepointsEndpoint = null;

    private ?HttpClientInterface $httpClient = null;

    private ?RequestFactoryInterface $requestFactory = null;

    private string $username;

    private string $token;

    public function __construct(string $username, string $token)
    {
        $this->username = $username;
        $this->token = $token;
    }

    public function get(string $uri): ResponseInterface
    {
        $url = sprintf('https://api.coolrunner.dk/v3/%s', $uri);

        return $this->getHttpClient()
            ->sendRequest(
                $this->getRequestFactory()
                    ->createRequest('GET', $url)
                    ->withHeader('Authorization', sprintf('Basic %s', base64_encode($this->username . ':' . $this->token)))
            );
    }

    public function products(): ProductsEndpointInterface
    {
        if (null === $this->productsEndpoint) {
            $this->productsEndpoint = new ProductsEndpoint($this);
        }

        return $this->productsEndpoint;
    }

    public function servicepoints(): ServicepointsEndpointInterface
    {
        if (null === $this->servicepointsEndpoint) {
            $this->servicepointsEndpoint = new ServicepointsEndpoint($this);
        }

        return $this->servicepointsEndpoint;
    }

    public function setHttpClient(?HttpClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    public function setRequestFactory(?RequestFactoryInterface $requestFactory): void
    {
        $this->requestFactory = $requestFactory;
    }

    private function getHttpClient(): HttpClientInterface
    {
        if (null === $this->httpClient) {
            $this->httpClient = Psr18ClientDiscovery::find();
        }

        return $this->httpClient;
    }

    private function getRequestFactory(): RequestFactoryInterface
    {
        if (null === $this->requestFactory) {
            $this->requestFactory = Psr17FactoryDiscovery::findRequestFactory();
        }

        return $this->requestFactory;
    }
}

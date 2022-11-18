<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface as HttpClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * @covers \Setono\CoolRunner\Client\Client
 */
final class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function it_sends_expected_request(): void
    {
        $username = 'username';
        $token = 'token';
        $expectedAuthorizationHeader = 'Basic ' . base64_encode("$username:$token");

        $httpClient = new MockHttpClient();

        $client = new Client($username, $token);
        $client->setHttpClient($httpClient);
        $client->get('servicepoints/gls?street=Highway 1');

        self::assertNotNull($httpClient->lastRequest);
        self::assertSame('GET', $httpClient->lastRequest->getMethod());
        self::assertSame('https://api.coolrunner.dk/v3/servicepoints/gls?street=Highway%201', (string) $httpClient->lastRequest->getUri());
        self::assertSame($expectedAuthorizationHeader, $httpClient->lastRequest->getHeaderLine('Authorization'));
    }
}

final class MockHttpClient implements HttpClientInterface
{
    public ?RequestInterface $lastRequest = null;

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $this->lastRequest = $request;

        return new Response();
    }
}

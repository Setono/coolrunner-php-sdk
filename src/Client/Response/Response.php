<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Response;

use Psl;
use Psr\Http\Message\ResponseInterface as PsrResponseInterface;
use Psr\Http\Message\StreamInterface;

final class Response implements ResponseInterface
{
    private PsrResponseInterface $decorated;

    public function __construct(PsrResponseInterface $decorated)
    {
        $this->decorated = $decorated;
    }

    public function getProtocolVersion(): string
    {
        return $this->decorated->getProtocolVersion();
    }

    /**
     * @param string $version
     *
     * @return static
     */
    public function withProtocolVersion($version): self
    {
        $clone = clone $this;
        $clone->decorated = $clone->decorated->withProtocolVersion($version);

        return $clone;
    }

    public function getHeaders(): array
    {
        return $this->decorated->getHeaders();
    }

    public function hasHeader($name): bool
    {
        return $this->decorated->hasHeader($name);
    }

    public function getHeader($name): array
    {
        return $this->decorated->getHeader($name);
    }

    public function getHeaderLine($name): string
    {
        return $this->decorated->getHeaderLine($name);
    }

    /**
     * @param string $name
     * @param string|string[] $value
     *
     * @return static
     */
    public function withHeader($name, $value): self
    {
        $clone = clone $this;
        $clone->decorated = $clone->decorated->withHeader($name, $value);

        return $clone;
    }

    /**
     * @param string $name
     * @param string|string[] $value
     *
     * @return static
     */
    public function withAddedHeader($name, $value): self
    {
        $clone = clone $this;
        $clone->decorated = $clone->decorated->withAddedHeader($name, $value);

        return $clone;
    }

    /**
     * @param string $name
     *
     * @return static
     */
    public function withoutHeader($name): self
    {
        $clone = clone $this;
        $clone->decorated = $clone->decorated->withoutHeader($name);

        return $clone;
    }

    public function getBody(): StreamInterface
    {
        return $this->decorated->getBody();
    }

    /**
     * @return static
     */
    public function withBody(StreamInterface $body): self
    {
        $clone = clone $this;
        $clone->decorated = $clone->decorated->withBody($body);

        return $clone;
    }

    public function getStatusCode(): int
    {
        return $this->decorated->getStatusCode();
    }

    /**
     * @param int $code
     * @param string $reasonPhrase
     *
     * @return static
     */
    public function withStatus($code, $reasonPhrase = ''): self
    {
        $clone = clone $this;
        $clone->decorated = $clone->decorated->withStatus($code, $reasonPhrase);

        return $clone;
    }

    public function getReasonPhrase(): string
    {
        return $this->decorated->getReasonPhrase();
    }

    public function toArray(): array
    {
        $data = json_decode((string) $this->getBody(), true, 512, \JSON_THROW_ON_ERROR);
        Psl\invariant(is_array($data), 'The decoded JSON MUST be of type array');

        return $data;
    }
}

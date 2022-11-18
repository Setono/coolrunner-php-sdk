<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Response;

use Psr\Http\Message\ResponseInterface as PsrResponseInterface;
use Psr\Http\Message\StreamInterface;
use Webmozart\Assert\Assert;

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
        // todo we should probably clone $this first and then overwrite the decorated
        $this->decorated = $this->decorated->withProtocolVersion($version);

        return $this;
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
        $this->decorated = $this->decorated->withHeader($name, $value);

        return $this;
    }

    /**
     * @param string $name
     * @param string|string[] $value
     *
     * @return static
     */
    public function withAddedHeader($name, $value): self
    {
        $this->decorated = $this->decorated->withAddedHeader($name, $value);

        return $this;
    }

    /**
     * @param string $name
     *
     * @return static
     */
    public function withoutHeader($name): self
    {
        $this->decorated = $this->decorated->withoutHeader($name);

        return $this;
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
        $this->decorated = $this->decorated->withBody($body);

        return $this;
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
        $this->decorated = $this->decorated->withStatus($code, $reasonPhrase);

        return $this;
    }

    public function getReasonPhrase(): string
    {
        return $this->decorated->getReasonPhrase();
    }

    public function toArray(): array
    {
        $data = json_decode((string) $this->getBody(), true, 512, \JSON_THROW_ON_ERROR);
        Assert::isArray($data);

        return $data;
    }
}

<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

use Setono\CoolRunner\Client\Response\ResponseInterface;
use Webmozart\Assert\Assert;

/**
 * @template T
 */
final class Collection
{
    /** @var list<T> */
    private array $entries = [];

    /**
     * @param class-string $entryClass
     */
    public static function fromResponse(ResponseInterface $response, string $entryClass, string $key): self
    {
        Assert::methodExists($entryClass, 'fromArray');

        $data = $response->toArray();
        Assert::keyExists($data, $key);

        $collection = new self();

        foreach ($data[$key] as $datum) {
            Assert::isArray($datum);

            /** @psalm-suppress MixedMethodCall */
            $collection->entries[] = $entryClass::fromArray($datum);
        }

        return $collection;
    }
}

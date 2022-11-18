<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Response\DTO;

use Setono\CoolRunner\Client\Response\ResponseInterface;
use Webmozart\Assert\Assert;

/**
 * @template T of FromArrayInstantiable
 */
final class Collection
{
    /** @var list<T> */
    private array $entries = [];

    /**
     * @param class-string<FromArrayInstantiable> $entryClass
     */
    public static function fromResponse(ResponseInterface $response, string $entryClass, string $key): self
    {
        $data = $response->toArray();
        Assert::keyExists($data, $key);

        $collection = new self();

        foreach ($data[$key] as $datum) {
            $collection->entries[] = $entryClass::fromArray($datum);
        }

        return $collection;
    }
}

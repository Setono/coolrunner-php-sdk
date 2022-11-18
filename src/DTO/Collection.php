<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

use Psl;
use Setono\CoolRunner\Client\Response\ResponseInterface;

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
        Psl\invariant(method_exists($entryClass, 'fromArray'), 'The $entryClass MUST have the static method "fromArray(array $data)"');

        $data = $response->toArray();
        Psl\invariant(isset($data[$key]), 'The key "%s" does not exist on the response array', $key);

        $collection = new self();

        foreach ($data[$key] as $datum) {
            Psl\invariant(is_array($datum), 'Each item on the collection MUST be of type array');

            /** @psalm-suppress MixedMethodCall */
            $collection->entries[] = $entryClass::fromArray($datum);
        }

        return $collection;
    }
}

<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

use ArrayIterator;
use Psl;
use Psr\Http\Message\ResponseInterface;

/**
 * @template T
 */
final class Collection implements \Countable, \IteratorAggregate
{
    /** @var list<T> */
    private array $entries = [];

    /**
     * @param class-string $entryClass
     */
    public static function fromResponse(ResponseInterface $response, string $entryClass): self
    {
        Psl\invariant(method_exists($entryClass, 'fromArray'), 'The $entryClass %s MUST have the static method "fromArray(array $data)"', $entryClass);

        $data = json_decode((string) $response->getBody(), true, 512, \JSON_THROW_ON_ERROR);
        Psl\invariant(is_array($data), 'The decoded JSON MUST be of type array');

        // find the collection key
        $keys = array_keys($data);
        Psl\invariant(count($keys) === 1, 'There MUST only be one key on the collection');
        $key = $keys[0];

        $collection = new self();

        foreach ($data[$key] as $datum) {
            Psl\invariant(is_array($datum), 'Each item on the collection MUST be of type array');

            /** @psalm-suppress MixedMethodCall */
            $collection->entries[] = $entryClass::fromArray($datum);
        }

        return $collection;
    }

    public function count(): int
    {
        return count($this->entries);
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->entries);
    }
}

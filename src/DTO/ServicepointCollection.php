<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

/**
 * @implements \IteratorAggregate<Servicepoint>
 */
final class ServicepointCollection implements \IteratorAggregate, \Countable
{
    /** @var list<Servicepoint> */
    public array $servicepoints;

    /**
     * @param list<Servicepoint> $servicepoints
     */
    public function __construct(array $servicepoints)
    {
        $this->servicepoints = $servicepoints;
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->servicepoints);
    }

    public function count(): int
    {
        return count($this->servicepoints);
    }

    public function isEmpty(): bool
    {
        return [] === $this->servicepoints;
    }
}

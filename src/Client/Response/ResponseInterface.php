<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Response;

use Psr\Http\Message\ResponseInterface as PsrResponseInterface;

interface ResponseInterface extends PsrResponseInterface
{
    public function toArray(): array;
}

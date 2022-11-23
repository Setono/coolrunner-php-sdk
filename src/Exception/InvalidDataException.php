<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Exception;

use Psl\Type\Exception\CoercionException;
use Psl\Type\TypeInterface;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;

final class InvalidDataException extends \InvalidArgumentException
{
    /**
     * @param mixed $data
     */
    public static function fromCoercionException(
        CoercionException $coercionException,
        TypeInterface $specification,
        $data
    ): self {
        $cloner = new VarCloner();
        $dumper = new CliDumper();
        $input = $dumper->dump($cloner->cloneVar($data), true);

        $message = sprintf(
            "Error: %s\nInput specification: %s\n\nInput\n---\n%s\n\nType trace\n%s",
            $coercionException->getMessage(),
            $specification->toString(),
            (string) $input,
            '- ' . implode("\n- ", $coercionException->getTypeTrace()->getFrames())
        );

        return new self($message, 0, $coercionException);
    }
}

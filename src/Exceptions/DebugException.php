<?php

declare(strict_types=1);

namespace Pest\Debug\Exceptions;

use RuntimeException;

final class DebugException extends RuntimeException
{
    public static function fromMessage(string $message): self
    {
        return new self($message);
    }
}

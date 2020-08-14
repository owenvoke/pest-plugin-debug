<?php

declare(strict_types=1);

namespace Pest\Debug;

use Pest\Debug\Exceptions\DebugException;
use PHPUnit\Framework\TestCase;

/** @internal */
trait HasDebugging
{
    public function dump($value, bool $isPropertyOnThis = false): TestCase
    {
        if ($isPropertyOnThis && is_string($value)) {
            $value = $this->getPropertyValue($value);
        }

        dump($value);

        return $this;
    }

    public function dd($value, bool $isPropertyOnThis = false): TestCase
    {
        if ($isPropertyOnThis && is_string($value)) {
            $value = $this->getPropertyValue($value);
        }

        dd($value);
    }

    private function getPropertyValue(string $propertyName)
    {
        if (!property_exists($this, $propertyName)) {
            throw DebugException::fromMessage("Property '{$propertyName}' does not exist in the current testcase");
        }

        return $this->{$propertyName};
    }
}

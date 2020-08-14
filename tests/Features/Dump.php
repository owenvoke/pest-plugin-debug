<?php

declare(strict_types=1);

use Pest\Debug\Exceptions\DebugException;

beforeEach(function () {
    $this->existingProperty = true;
});

it('dumps content that is provided')->dump(null)->assertTrue(true);

it('dumps property on testcase instance')->dump('existingProperty', true)->assertTrue(true);

it('does not dump non-existant property on testcase instance')
    ->throws(DebugException::class)
    ->dump('nonExistingProperty', true);

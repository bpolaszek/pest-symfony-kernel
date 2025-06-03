<?php

namespace App\Tests;

use App\Kernel;

use function BenTools\Pest\Symfony\app;

it('works', function () {
    $app = app();
    expect($app)->toBeInstanceOf(Kernel::class)
        ->and(app())->toBe($app);
});

it('reinstantiates the app', function () {
    $app = app();
    expect($app)->toBeInstanceOf(Kernel::class)
        ->and(app(true))->not->toBe($app);
});

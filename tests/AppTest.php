<?php

namespace App\Tests;

use function BenTools\Pest\Symfony\app;

it('works', function () {
    $app = app();
    expect(app())->toBe($app);
    expect(app(true))->not()->toBe($app);
});

<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\TestContainer;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\Routing\RouterInterface;

use function BenTools\Pest\Symfony\container;
use function BenTools\Pest\Symfony\inject;

it('returns the container', function () {
    $container = container();
    expect($container)->toBeInstanceOf(ContainerInterface::class)
        ->and($container)->toBeInstanceOf(TestContainer::class)
    ;
});

it('injects a service', function () {
    $service = inject(RouterInterface::class);
    expect($service)->toBeInstanceOf(RouterInterface::class);
});

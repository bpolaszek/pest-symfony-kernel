<?php

namespace BenTools\Pest\Symfony;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

use function uniqid;

function app(bool $reInstanciate = false): KernelInterface
{
    static $kernel;

    if (null === $kernel || $reInstanciate) {
        $testCase = new class () extends KernelTestCase {
            public function __construct()
            {
                parent::__construct(uniqid());
            }

            public function getKernel(): KernelInterface
            {
                self::bootKernel();

                return self::$kernel;
            }
        };
        $kernel = $testCase->getKernel();
    }

    return $kernel;
}

function container(?KernelInterface $app = null): ContainerInterface
{
    $app ??= app();

    /** @var ContainerInterface $testContainer */
    $testContainer = $app->getContainer()->get('test.service_container', ContainerInterface::NULL_ON_INVALID_REFERENCE);

    return $testContainer;
}

/**
 * @template T of object
 *
 * @param class-string<T> $serviceId
 *
 * @return T of object
 */
function inject(string $serviceId, ?ContainerInterface $container = null): object
{
    $container ??= container();

    return $container->get($serviceId);
}

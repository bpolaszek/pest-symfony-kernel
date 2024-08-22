<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

use function dirname;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function getProjectDir(): string
    {
        return dirname(__DIR__);
    }

    public function getLogDir(): string
    {
        return dirname(__DIR__, 3) . '/var/log';
    }

    public function getCacheDir(): string
    {
        return dirname(__DIR__, 3) . '/var/cache';
    }
}

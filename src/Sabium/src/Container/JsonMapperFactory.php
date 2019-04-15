<?php

declare(strict_types=1);

namespace Sabium\Container;

use Psr\Container\ContainerInterface;

class JsonMapperFactory
{
    public function __invoke(ContainerInterface $container) : \JsonMapper
    {
        return new \JsonMapper();
    }
}

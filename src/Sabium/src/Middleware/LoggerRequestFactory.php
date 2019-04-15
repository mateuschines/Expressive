<?php

declare(strict_types=1);

namespace Sabium\Middleware;

use Psr\Container\ContainerInterface;
use Monolog\Logger;

class LoggerRequestFactory
{
    public function __invoke(ContainerInterface $container) : LoggerRequest
    {
        $logger = $container->get(Logger::class);
        return new LoggerRequest($logger);
    }
}

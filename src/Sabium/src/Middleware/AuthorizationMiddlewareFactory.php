<?php

declare(strict_types=1);

namespace Sabium\Middleware;

use Psr\Container\ContainerInterface;

class AuthorizationMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : AuthorizationMiddleware
    {
        $token = '123#$_';
        return new AuthorizationMiddleware($token);
    }
}

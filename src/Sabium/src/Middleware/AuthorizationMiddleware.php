<?php

declare(strict_types=1);

namespace Sabium\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\EmptyResponse;

class AuthorizationMiddleware implements MiddlewareInterface
{

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {

        if ($this->token === $request->getHeaderLine('authorization')) {
            return $handler->handle($request);
        }

        return new EmptyResponse(401);
    }
}

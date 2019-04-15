<?php

declare(strict_types=1);

namespace Sabium\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoggerRequest implements MiddlewareInterface
{

    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        $retorno = $handler->handle($request);

        $this->logger->info(sprintf(
            "\nclient: %s \nnuri: %s \nstatusCode: %s \nbody: %s",
            $request->getServerParams()['SERVER_ADDR'],
            $request->getServerParams()['HTTP_HOST'] .  $request->getServerParams()['REQUEST_URI'],
            $request->getServerParams()['REDIRECT_STATUS'],
            $request->getBody()->getContents()
        ));

        return $retorno;
    }
}

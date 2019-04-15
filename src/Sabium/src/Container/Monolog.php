<?php

declare(strict_types=1);

namespace Sabium\Container;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Monolog
{

    public function __construct(
        $logger
    ) {
        $this->logger = $logger;
    }

    public function process(ServerRequestInterface $request) : RequestHandlerInterface
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

<?php

declare(strict_types=1);

namespace Sabium\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Zend\Diactoros\Response\EmptyResponse;
use Sabium\Entity\Pessoa;

class PessoaEndpointValidator implements MiddlewareInterface
{
    protected $pessoaRepository;

    public function __construct($pessoaRepository)
    {
        $this->pessoaRepository = $pessoaRepository;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        $pessoa = $this->pessoaRepository->findOneBy(['idcnpj_cpf' => $request->getAttribute('id')]);

        if ($pessoa === null) {
            return new EmptyResponse(404);
        }

        return $handler->handle($request->withAttribute(Pessoa::class, $pessoa));
    }
}

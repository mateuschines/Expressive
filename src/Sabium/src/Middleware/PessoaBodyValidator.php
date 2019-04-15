<?php

declare(strict_types=1);

namespace Sabium\Middleware;

use Sabium\Entity\Pessoa;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PessoaBodyValidator implements MiddlewareInterface
{

    protected $pessoaRepository;
    protected $objectValidator;
    protected $serializer;

    public function __construct($pessoaRepository, $objectValidator, $serializer)
    {
        $this->pessoaRepository = $pessoaRepository;
        $this->objectValidator = $objectValidator;
        $this->serializer = $serializer;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler) : ResponseInterface
    {
        $dados = $request->getBody()->getContents();

        $dadosPessoa = $this->serializer->deserialize($dados, Pessoa::class, 'json');

        $validate = $this->objectValidator->validate($dadosPessoa);

        if (!$validate) {
            return new JsonResponse($this->objectValidator->getErrors(), 400);
        }

        return $handler->handle($request);
    }
}

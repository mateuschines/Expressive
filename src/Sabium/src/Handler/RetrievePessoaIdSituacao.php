<?php

declare (strict_types = 1);

namespace Sabium\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Doctrine\ORM\ORMException;
use Zend\Diactoros\Response\EmptyResponse;
use Sabium\Repository\PessoaRepository;
use Zend\Diactoros\Response\JsonResponse;

class RetrievePessoaIdSituacao implements RequestHandlerInterface
{

    protected $pessoaRepository;

    public function __construct(PessoaRepository $pessoaRepository)
    {
        $this->pessoaRepository = $pessoaRepository;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        try {
            $id = $request->getAttribute('id');

            $resultado = $this->pessoaRepository->findBySituacao($id);


            //$array = (array) $resultado;

            return new JsonResponse($resultado);
        } catch (ORMException $e) {
            return new EmptyResponse(500);
        }
    }
}

<?php

declare(strict_types=1);

namespace Sabium\Handler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Sabium\Entity\Pessoa;
use Zend\Diactoros\Response\JsonResponse;
use Doctrine\ORM\ORMException;
use Zend\Diactoros\Response\EmptyResponse;

class DeletePessoaHandler implements RequestHandlerInterface
{
    protected $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {

        try {
            $pessoa = $request->getAttribute(Pessoa::class);

            $this->entityManager->remove($pessoa);

            $this->entityManager->flush();

            return new JsonResponse(["message"=>"Deletado com Sucesso"]);
        } catch (ORMException $e) {
            return new EmptyResponse(500);
        }
    }
}

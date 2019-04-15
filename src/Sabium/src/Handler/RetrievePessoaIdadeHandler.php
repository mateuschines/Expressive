<?php

declare(strict_types=1);

namespace Sabium\Handler;

use Sabium\Entity\Pessoa;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\EmptyResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Sabium\Repository\RepositoryPDOException;
use Zend\Diactoros\Response\JsonResponse;

class RetrievePessoaIdadeHandler implements RequestHandlerInterface
{
    public function __construct($entityManager, $calculaIdade)
    {
        $this->entityManager = $entityManager;
        $this->calculaIdade = $calculaIdade;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        try {
            $cnpj = $request->getAttribute('cnpj');
            $pessoa = $this->entityManager->getRepository(Pessoa::class)->findOneBy(['idcnpj_cpf' => $cnpj]);

            $dataResponse = $this->calculaIdade->getIdadeByDataNascimento($pessoa->getDatacriacao());
            $resultado[] = [
                'idade' => $dataResponse,
            ];

            return new JsonResponse($resultado);
        } catch (RepositoryPDOException $e) { //se nao der ele executa o catch
            return new EmptyResponse(500);
        }
    }
}

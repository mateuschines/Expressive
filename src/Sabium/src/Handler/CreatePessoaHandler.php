<?php

declare(strict_types=1);

namespace Sabium\Handler;

use Sabium\Entity\Pessoa;
use JMS\Serializer\Serializer;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;

use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Sabium\Service\CalculaIdade;

class CreatePessoaHandler implements RequestHandlerInterface
{

    public function __construct(
        $objectValidate,
        Serializer $serializer,
        EntityManager $entityManager
    ) {
        $this->objectValidate = $objectValidate;
        $this->serializer = $serializer;
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        try {
            $dados = $request->getBody()->getContents();

            $dadosPessoa = $this->serializer->deserialize($dados, Pessoa::class, 'json');

            $this->entityManager->persist($dadosPessoa);

            $this->entityManager->flush();
            return new JsonResponse(['message'=>'inserido com sucesso']);
        } catch (ORMException $e) {
            $result['_error']['error'] = 'not_created';
            $result['_error']['error_description'] = $e->getMessage();
            return new JsonResponse($result, 400);
        }




















        /*
           /// errors validate do macoto
            $errorsMessage['errors'] = array_map(function($error){
                return ['message' => $errors->getM<essage()]
            }, $validation)

        */


/*
        $dadosPessoa = new Pessoa();

        $dadosPessoa->setIdcnpjCpf($dados->idcnpj_cpf);
        $dadosPessoa->setIdtipopessoa($dados->idtipopessoa);
        $dadosPessoa->setIdsituacaopessoa($dados->idsituacaopessoa);
        $dadosPessoa->setIdtiposexo($dados->idtiposexo);
        $dadosPessoa->setCnpjCpf($dados->cnpj_cpf);
        $dadosPessoa->setNome($dados->nome);
        $dadosPessoa->setCceRg($dados->cce_rg);
        $dadosPessoa->setDatacriacao(new \DateTime());*/

        //$dadosPessoa = $this->jsonMapper->map($dados, new Pessoa());

        //var_dump($dadosPessoa->getIdcnpjCpf());exit;




        // Create and return a response
        //vai tentar executar isso

        //Metodo antigo para inserir no banco com conection pdo
        /*
        try {
            $dados = json_decode($request->getBody()->getContents());

            $dadosPessoa = $this->jsonMapper->map($dados, new Pessoa());

            $this->pessoaRepository->insert($dadosPessoa);

            return new JsonResponse(['message'=>'inserido com sucesso']);
        } catch (RepositoryPDOException $e) {//se nao der ele executa o catch
            return new EmptyResponse(500);
        }*/


        //$resultado= $stmt->fetchAll();
        // if (!$resultado) {
        //     return new EmptyResponse(400);
        // } else {
        //     return new JsonResponse(['message'=>'inserido com sucesso']);
        // }
    }
}

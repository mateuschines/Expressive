<?php

declare(strict_types=1);

namespace Sabium\Handler;

use Sabium\Entity\Pessoa;
use JMS\Serializer\Serializer;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\EmptyResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class UpdatePessoaHandler implements RequestHandlerInterface
{

    protected $serializer;
    protected $jsonMapper;

    public function __construct(Serializer $serializer, EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
    }

    public function handle(ServerRequestInterface $request) : ResponseInterface
    {
        try {
            $id = $request->getAttribute('id');
            //$pessoa = new Pessoa();
            $dados = json_decode($request->getBody()->getContents());
            //var_dump($dados->idcnpj_cpf);exit;
            $pessoas = $this->entityManager->getRepository(Pessoa::class)->findOneBy(['idcnpj_cpf' => $id]);


            if (!empty($pessoas)) {
                //$dadosPessoa = $this->serializer->deserialize($dados, Pessoa::class, 'json');

                $pessoas->setIdCnpjCpf($dados->idcnpj_cpf);
                $pessoas->setCnpjCpf($dados->cnpj_cpf);
                $pessoas->setNome($dados->nome);
                $pessoas->setIdtipopessoa($dados->idtipopessoa);
/*
                "idsituacaopessoa": 13,
                "idtiposexo": 12,
                "cce_rg": "124",
                "datacriacao": "1997-04-10"*/
                //var_dump($pessoas->getNome());
                //exit;
                $this->entityManager->persist($pessoas);
                $this->entityManager->flush();

                return new JsonResponse(['message'=>'atualizado']);
            }

            return new JsonResponse(['message'=>'registro nao encontrado']);
        } catch (ORMException $e) {
            return new JsonResponse($e, 500);
        }
    }
}

/*
Handler antigo

$dadosPessoa = $this->jsonMapper->map($dados, new Pessoa());
//update gazin.tipopedido set idtipopedido = ?, descricao = ? where idtipopedido = ?
        $stmt = $this->conexaoSabium->prepare("update glb.pessoa set idtipopessoa = ?, idsituacaopessoa = ?, idtiposexo = ?, cnpj_cpf = ?, nome = ?, cce_rg = ?, datacriacao = ? where idcnpj_cpf = ?");
        //$stmt = $this->conexaoSabium->prepare("select * from glb.pessoa");

        $stmt->bindValue(1, $dadosPessoa->getIdtipopessoa());
        $stmt->bindValue(2, $dadosPessoa->getIdsituacaopessoa());
        $stmt->bindValue(3, $dadosPessoa->getIdtiposexo());
        $stmt->bindValue(4, $dadosPessoa->getCnpjCpf());
        $stmt->bindValue(5, $dadosPessoa->getNome());
        $stmt->bindValue(6, $dadosPessoa->getCceRg());
        $stmt->bindValue(7, $dadosPessoa->getDatacriacao());
        $stmt->bindValue(8, $id);

        $resultado = $stmt->execute();
        //$resultado= $stmt->fetchAll();
        if (!$resultado) {
            return new EmptyResponse(500);
        } else {
            return new JsonResponse(['message'=>'alterado com sucesso']);
        }



*/

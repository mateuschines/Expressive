<?php

declare (strict_types = 1);

namespace Sabium\Handler;

use Zend\Diactoros\Response;
use JMS\Serializer\Serializer;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;
use Sabium\Repository\PessoaRepository;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\TextResponse;
use Zend\Diactoros\Response\EmptyResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Sabium\Entity\Pessoa;

class PessoaHandler implements RequestHandlerInterface
{

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        try {
            $id = $request->getAttribute('id');
            $pessoa = $this->entityManager->getRepository(\Sabium\Entity\Pessoa::class)->find();
            //$this->entityManager->getRepository(\Sabium\Entity\Pessoa::class)->find();
            return new JsonResponse($pessoa->getPessoa());
        } catch (RepositoryPDOException $e) { //se nao der ele executa o catch
            return new EmptyResponse(500);
        }
        /* return new JsonResponse($pessoa->getPessoa()); */
        //$pessoa->id = $request->getAttribute('id') ?? null;
        //getQueryParams(); para pegar como get os parametros url

        //$pessoa->nome = "mateus";

        // return new JsonResponse($pessoa);
        // return new XmlResponse('<body>Melancia jr devolve minha cadeira
        //                             EU</body>');
    }
}


        // Create and return a response



//select * from glb.pessoa where cnpj_cpj = ?

//select * from gazin.tipopedido

        //$stmt = $this->conexaoSabium->prepare("select * from glb.pessoa");


        //$stmt->fetchAll(\PDO::FETCH_CLASS);
        /*$stmt->execute();
        $resultado = $stmt->fetchAll();*/

        /*if (!$resultado == false) {
            return new JsonResponse($resultado);
        } else {
            return new EmptyResponse(404);
        }*/

        //$pessoa->id = $request->getAttribute('id') ?? null;
        //getQueryParams(); para pegar como get os parametros url

        //$pessoa->nome = "mateus";

       // return new JsonResponse($pessoa);
        // return new XmlResponse('<body>Melancia jr devolve minha cadeira
        //                             EU</body>');

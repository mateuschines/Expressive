<?php

declare (strict_types = 1);

namespace Sabium\Handler;

use Sabium\Entity\Pessoa;

use JMS\Serializer\Serializer;
use Doctrine\ORM\EntityManager;

use Psr\Http\Message\ResponseInterface;

use Zend\Diactoros\Response\TextResponse;
use Zend\Diactoros\Response\EmptyResponse;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RetrievePessoaHandler implements RequestHandlerInterface
{

    public function __construct(EntityManager $entityManager, Serializer $serializer, $logger)
    {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
        $this->logger = $logger;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $this->logger->info(sprintf(
            "\nclient: %s \nnuri: %s \nstatusCode: %s \nbody: %s",
            $request->getServerParams()['SERVER_ADDR'],
            $request->getServerParams()['HTTP_HOST'] .  $request->getServerParams()['REQUEST_URI'],
            $request->getServerParams()['REDIRECT_STATUS'],
            $request->getBody()->getContents()
        ));

        try {
            $pessoa = $request->getAttribute(Pessoa::class);

            //$this->entityManager->getRepository(\Sabium\Entity\Pessoa::class)->find();
            return new TextResponse(
                $this->serializer->serialize($pessoa, 'json'),
                200,
                ['Content-Type' => 'application/json']
            );
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

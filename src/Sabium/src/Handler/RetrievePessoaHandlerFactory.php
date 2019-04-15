<?php

declare(strict_types=1);

namespace Sabium\Handler;

use Psr\Container\ContainerInterface;
use Sabium\Repository\PessoaRepository;
use Doctrine\ORM\EntityManager;
use Sabium\Entity\Pessoa;
use Monolog\Logger;

class RetrievePessoaHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RetrievePessoaHandler
    {
        $entityManager = $container->get('Doctrine\ORM\EntityManager');
        $serialize = $container->get('serializer');
        $logger = $container->get(Logger::class);
        return new RetrievePessoaHandler($entityManager, $serialize, $logger);
    }
}

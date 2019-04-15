<?php

declare(strict_types=1);

namespace Sabium\Handler;

use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

class PessoaHandlerFactory
{
    public function __invoke(ContainerInterface $container) : PessoaHandler
    {
        $conexaoSabium = $container->get('sabium-db');
        $entityManager = $container->get(EntityManager::class);

        return new PessoaHandler($entityManager);
    }
}

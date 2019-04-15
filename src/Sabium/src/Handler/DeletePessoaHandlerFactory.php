<?php

declare(strict_types=1);

namespace Sabium\Handler;

use Sabium\Entity\Pessoa;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;

class DeletePessoaHandlerFactory
{
    public function __invoke(ContainerInterface $container) : DeletePessoaHandler
    {
        $entityManager = $container->get(EntityManager::class);

        return new DeletePessoaHandler($entityManager);
    }
}

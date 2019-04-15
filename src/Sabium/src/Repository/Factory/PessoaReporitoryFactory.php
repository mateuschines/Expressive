<?php

declare(strict_types=1);

namespace Sabium\Repository\Factory;

use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use Sabium\Repository\PessoaRepository;

class PessoaRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : PessoaRepository
    {
        $entityManager = $container->get(EntityManager::class);

        return new PessoaRepository($entityManager);
    }
}

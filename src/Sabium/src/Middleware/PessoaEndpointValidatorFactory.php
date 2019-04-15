<?php

declare(strict_types=1);

namespace Sabium\Middleware;

use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use Sabium\Entity\Pessoa;

class PessoaEndpointValidatorFactory
{
    public function __invoke(ContainerInterface $container) : PessoaEndpointValidator
    {
        $entityManager = $container->get(EntityManager::class);
        $pessoaRepository = $entityManager->getRepository(Pessoa::class);
        return new PessoaEndpointValidator($pessoaRepository);
    }
}

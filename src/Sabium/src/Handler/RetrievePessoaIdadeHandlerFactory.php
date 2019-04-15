<?php

declare(strict_types=1);

namespace Sabium\Handler;

use Sabium\Service\CalculaIdade;
use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

class RetrievePessoaIdadeHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RetrievePessoaIdadeHandler
    {
        $entityManager = $container->get(EntityManager::class);
        $calculaIdade = $container->get(CalculaIdade::class);
        return new RetrievePessoaIdadeHandler($entityManager, $calculaIdade);
    }
}

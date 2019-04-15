<?php

declare(strict_types=1);

namespace Sabium\Handler;

use Psr\Container\ContainerInterface;
use Sabium\Container\JsonMapperFactory;

class UpdatePessoaHandlerFactory
{
    public function __invoke(ContainerInterface $container) : UpdatePessoaHandler
    {
        $entityManager = $container->get('Doctrine\ORM\EntityManager');
        $serializer = $container->get('serializer');
        return new UpdatePessoaHandler($serializer, $entityManager);
    }
}

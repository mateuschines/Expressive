<?php

declare(strict_types=1);

namespace Sabium\Handler;

use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;
use Sabium\Service\Validation\ObjectValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Monolog\Logger;

class CreatePessoaHandlerFactory
{
    public function __invoke(ContainerInterface $container) : CreatePessoaHandler
    {
        $validator = $container->get(\Symfony\Component\Validator\Validation::class);
        $entityManager = $container->get(EntityManager::class);
        $serialize = $container->get('serializer');
        $objectValidator = $container->get(ObjectValidator::class);

        return new CreatePessoaHandler($objectValidator, $serialize, $entityManager);
    }
}

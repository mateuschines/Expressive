<?php

declare(strict_types=1);

namespace Sabium\Middleware;

use Sabium\Entity\Pessoa;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;
use Sabium\Service\Validation\ObjectValidator;

class PessoaBodyValidatorFactory
{
    public function __invoke(ContainerInterface $container) : PessoaBodyValidator
    {
        $entityManager = $container->get(EntityManager::class);
        $pessoaRepository = $entityManager->getRepository(Pessoa::class);
        $objectValidator = $container->get(ObjectValidator::class);
        $serialize = $container->get('serializer');
        return new PessoaBodyValidator($pessoaRepository, $objectValidator, $serialize);
    }
}

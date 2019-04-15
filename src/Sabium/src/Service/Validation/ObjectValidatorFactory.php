<?php

declare(strict_types=1);

namespace Sabium\Service\Validation;

use Psr\Container\ContainerInterface;
use Symfony\Component\Validator\Validation;

class ObjectValidatorFactory
{
    public function __invoke(ContainerInterface $container) : ObjectValidator
    {
        $validator = $container->get(Validation::class);
        return new ObjectValidator($validator);
    }
}

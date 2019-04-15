<?php

declare(strict_types=1);

namespace Sabium\Util;

use Psr\Container\ContainerInterface;

class CalculadoraFactory
{
    public function __invoke(ContainerInterface $container) : Calculadora
    {
        return new Calculadora();
    }
}

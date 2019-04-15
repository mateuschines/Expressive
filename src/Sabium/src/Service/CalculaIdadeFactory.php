<?php

declare(strict_types=1);

namespace Sabium\Service;

use Psr\Container\ContainerInterface;

class CalculaIdadeFactory
{
    public function __invoke(ContainerInterface $container) : CalculaIdade
    {
        return new CalculaIdade();
    }
}

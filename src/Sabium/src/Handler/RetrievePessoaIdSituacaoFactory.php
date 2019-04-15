<?php

declare(strict_types=1);

namespace Sabium\Handler;

use Psr\Container\ContainerInterface;

class RetrieveSituacaoPessoaHandlerFactory
{
   public function __invoke(ContainerInterface $container) : RetrieveSituacaoPessoaHandler
   {
       $pessoaRepository = $container->get('pessoaRepository');
       return new RetrieveSituacaoPessoaHandler($pessoaRepository);
   }
}

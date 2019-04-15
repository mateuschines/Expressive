<?php

namespace Sabium;

use Psr\Container\ContainerInterface;
use Sabium\Handler\DeletePessoaHandler;
use Sabium\Middleware\PessoaBodyValidator;
use Sabium\Middleware\PessoaDeleteValidator;
use Sabium\Handler\RetrievePessoaIdadeHandler;
use Sabium\Middleware\PessoaEndpointValidator;

class RoutesDelegator
{

    /**
     * @param ContainerInterface $container
     * @param string $serviceName Name of the service being created.
     * @param callable $callback Creates and returns the service.
     * return Application
     */

    public function __invoke(ContainerInterface $container, $serviceName, callable $callback)
    {
        /**@var $app Application */
        $app = $callback();

        //$app->get('/pessoas', \Sabium\Handler\PessoaHandler::class, 'api.pessoas');

        $app->get('/pessoas', \Sabium\Handler\PessoaHandler::class, 'pessoa.all');


        $app->get('/pessoas/{id:\d+}', [PessoaEndpointValidator::class,\Sabium\Handler\RetrievePessoaHandler::class], 'pessoa.by.id');

        //para criar pessoas
        $app->post('/pessoas', [PessoaBodyValidator::class, Handler\CreatePessoaHandler::class], 'create.pessoas');

        $app->put('/pessoas/{id:\d+}', \Sabium\Handler\UpdatePessoaHandler::class, 'update.pessoas');

        $app->get('/situacao/{id:\d+}/pessoas', \Sabium\Handler\RetrievePessoaIdSituacao::class, 'situacao.by.id');

        $app->get('/pessoas/{cnpj}/idade', RetrievePessoaIdadeHandler::class, 'retrieve.idade');

        $app->delete('/pessoas/{id:\d+}', [PessoaEndpointValidator::class, DeletePessoaHandler::class], 'delete.pessoas');

        return $app;
    }
}

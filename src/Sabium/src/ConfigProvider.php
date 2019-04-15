<?php

declare(strict_types=1);

namespace Sabium;

use Monolog\Logger;
use Doctrine\ORM\EntityManager;
use Sabium\Service\CalculaIdade;
use Zend\Expressive\Application;
use Sabium\Container\MonologFactory;
use Psr\Container\ContainerInterface;
use Sabium\Container\ValidationFactory;
use Sabium\Handler\DeletePessoaHandler;
use Sabium\Service\CalculaIdadeFactory;
use Sabium\Middleware\PessoaBodyValidator;
use Symfony\Component\Validator\Validation;
use Sabium\Middleware\PessoaDeleteValidator;
use Sabium\Handler\DeletePessoaHandlerFactory;
use Sabium\Middleware\AuthorizationMiddleware;
use Sabium\Service\Validation\ObjectValidator;
use Sabium\Middleware\PessoaBodyValidatorFactory;
use ContainerInteropDoctrine\EntityManagerFactory;
use Sabium\Middleware\PessoaDeleteValidatorFactory;
use Sabium\Middleware\AuthorizationMiddlewareFactory;
use Sabium\Service\Validation\ObjectValidatorFactory;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * The configuration provider for the Sabium module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     */
    public function __invoke() : array
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies() : array
    {
        return [
            'delegators' =>[
                Application::class =>[
                    RoutesDelegator::class,
                ],
            ],
            'invokables' => [
            ],//FACTORY É SEMPRE DEPOIS CHINESSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
            'factories'  => [
                EntityManager::class => EntityManagerFactory::class,
                Handler\PessoaHandler::class => Handler\PessoaHandlerFactory::class,
                'sabium-db' => Container\ConnectionFactory::class,
                Container\JsonMapperFactory::class => Container\JsonMapperFactory::class,
                \Sabium\Handler\RetrievePessoaHandler::class => \Sabium\Handler\RetrievePessoaHandlerFactory::class,
                \Sabium\Handler\UpdatePessoaHandler::class => \Sabium\Handler\UpdatePessoaHandlerFactory::class,
                \Sabium\Handler\CreatePessoaHandler::class => \Sabium\Handler\CreatePessoaHandlerFactory::class,
                 'pessoaFactory' => Repository\Factory\PessoaRepositoryFactory::class,
                 'serializer' => \Sabium\Container\JMSFactory::class,
                 Validation::class => ValidationFactory::class,
                 ObjectValidator::class => ObjectValidatorFactory::class,
                 CalculaIdade::class => CalculaIdadeFactory::class,
                 \Sabium\Handler\RetrievePessoaIdadeHandler::class => \Sabium\Handler\RetrievePessoaIdadeHandlerFactory::class,
                 Sabium\Util\Calculadora::class => Sabium\Util\CalculadoraFactory::class,
                 \Sabium\Middleware\PessoaEndpointValidator::class => \Sabium\Middleware\PessoaEndpointValidatorFactory::class,
                 PessoaBodyValidator::class => PessoaBodyValidatorFactory::class,
                 DeletePessoaHandler::class => DeletePessoaHandlerFactory::class,
                 PessoaDeleteValidator::class => PessoaDeleteValidatorFactory::class,
                 Logger::class => MonologFactory::class,
                 AuthorizationMiddleware::class => AuthorizationMiddlewareFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     */
    public function getTemplates() : array
    {
        return [
            'paths' => [
                'sabium'    => [__DIR__ . '/../templates/'],
            ],
        ];
    }
}

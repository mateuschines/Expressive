<?php

declare(strict_types=1);

namespace Sabium\Container;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;
use Monolog\Formatter\JsonFormatter;
use Monolog\Formatter\LineFormatter;
use Psr\Container\ContainerInterface;

class MonologFactory
{
    public function __invoke(ContainerInterface $container) : Logger
    {

        $stream = new StreamHandler(__DIR__.'/../Log/'.date('Y-m-d').'.log', Logger::INFO);

        $dateTime = "Y-m-d H-i";

        $output = "%datetime% > %level_name% %message%\n";
        $formatter = new LineFormatter($output, $dateTime);
        $stream->setFormatter($formatter);

        $loggerHandler = new Logger('log');

        $loggerHandler->pushHandler($stream);

        return $loggerHandler;
    }
}

<?php

namespace Sabium\Container;

use Psr\Container\ContainerInterface;
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;

class JMSFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $loader = require __DIR__.'/../../../../vendor/autoload.php';
        AnnotationRegistry::registerLoader([$loader, 'loadClass']);
        AnnotationRegistry::registerAutoloadNamespace(
            'Sinfony\Component\Validator\Constraints',
            '/vendor/synfony/validator'
        );

        $serializer = \JMS\Serializer\SerializerBuilder::create()->setPropertyNamingStrategy(
            new SerializedNameAnnotationStrategy(
                new IdenticalPropertyNamingStrategy()
            )
        )
        ->build();

        return $serializer;
    }
}

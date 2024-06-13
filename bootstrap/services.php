<?php

use Limon\Handler\DefaultResolver;
use Mira\Engine;
use Limon\Kernel;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;

use function Envase\get;
use function Ruta\cachedRouter;

return [
    // Limon Injections
    Psr\Http\Server\RequestHandlerInterface::class => get(Kernel::class),
    Limon\Handler\HandlerResolverInterface::class => get(DefaultResolver::class),

    // Routes mapping
    Ruta\Router::class => fn(ContainerInterface $c) =>
        cachedRouter(function($r) {
            return (require __DIR__ . '/routes.php')($r);
        }, [
            'cacheDir' => $c->get('cache_dir'),
            'cacheEnabled' => $c->get('ENVIRONMENT') !== 'DEVELOPMENT'
        ]
    ),

    // PSR Injections
    ServerRequestFactoryInterface::class => get(Psr17Factory::class),
    UriFactoryInterface::class => get(Psr17Factory::class),
    UploadedFileFactoryInterface::class => get(Psr17Factory::class),
    StreamFactoryInterface::class => get(Psr17Factory::class),
    ResponseFactoryInterface::class => get(Psr17Factory::class),

    Engine::class => fn() => new Engine(__DIR__ . '/../src/View')
];
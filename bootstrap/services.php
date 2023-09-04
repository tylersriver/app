<?php

use Limon\Kernel;
use function Envase\get;
use function Ruta\cachedRouter;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;

return [
    // Limon Injections
    Psr\Http\Server\RequestHandlerInterface::class => get(Kernel::class),
    Limon\Handler\HandlerResolverInterface::class => get(App\HandlerResolver::class),

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
    ResponseFactoryInterface::class => get(Psr17Factory::class)
];
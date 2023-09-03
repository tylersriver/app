<?php

use Psr\Http\Message\UriFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use PSr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;

use function Ruta\cachedRouter;

return [
    // Limon Injections
    Psr\Http\Server\RequestHandlerInterface::class => Limon\Kernel::class,
    Limon\Handler\HandlerResolverInterface::class => Limon\Handler\ActionResolver::class,

    Ruta\Router::class => fn(ContainerInterface $c) =>
        cachedRouter(function($r) {
            (require __DIR__ . '/routes.php')($r);
        }, [
            'cacheDir' => $c->get('cache_dir'),
            'cacheEnabled' => $c->get('ENVIRONMENT') !== 'DEVELOPMENT'
        ]
    ),

    // PSR Injections
    ServerRequestFactoryInterface::class => Psr17Factory::class,
    UriFactoryInterface::class => Psr17Factory::class,
    UploadedFileFactoryInterface::class => Psr17Factory::class,
    StreamFactoryInterface::class => Psr17Factory::class,
    ResponseFactoryInterface::class => Psr17Factory::class
];
<?php

use Psr\Http\Message\UriFactory;
use Psr\Http\Message\StreamFactory;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\UploadedFileFactory;
use Psr\Http\Message\ServerRequestFactoryInterface;

return [
    // Limon Injections
    Psr\Http\Server\RequestHandlerInterface::class => Limon\Kernel::class,
    Limon\Handler\HandlerResolverInterface::class => Limon\Handler\ActionResolver::class,

    // PSR Injections
    ServerRequestFactoryInterface::class => Psr17Factory::class,
    UriFactory::class => Psr17Factory::class,
    UploadedFileFactory::class => Psr17Factory::class,
    StreamFactory::class => Psr17Factory::class,
];
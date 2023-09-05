<?php

declare(strict_types=1);

use Nyholm\Psr7Server\ServerRequestCreator;

// Delegate static file requests back to the PHP built-in webserver
if (PHP_SAPI === 'cli-server' && $_SERVER['SCRIPT_FILENAME'] !== __FILE__) {
    return false;
}

require_once __DIR__ . '/../vendor/autoload.php';

(function() {
    $container = (require __DIR__ . '/../bootstrap/container.php')();

    // Create the application
    $app = $container->get(Limon\App::class);

    // Register Middleware
    (require __DIR__ . '/../bootstrap/middleware.php')($app, $container);

    // Capture Request from PHP super globals
    $creator = $container->get(ServerRequestCreator::class);
    $request = $creator->fromGlobals();

    // Handle the request
    $res = $app->handle($request);

    // respond to client
    Limon\emit($res);
})();
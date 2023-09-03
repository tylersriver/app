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

    $app = $container->get(Limon\App::class);

    $creator = $container->get(ServerRequestCreator::class);
    $request = $creator->fromGlobals();

    $res = $app->handle($request);

    Limon\emit($res);
})();
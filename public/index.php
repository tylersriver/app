<?php

/**
 * Require the Autoloader
 */
require_once __DIR__ . '/../vendor/autoload.php';

error_reporting(0); 

/**
 * Create your app
 * 
 * The config array passed to the create function 
 * can originate from anywhere, create it here or have 
 * a separate config file stored elsewhere
 */
$app = Ion\App::create([
    'default_controller' => 'view',    // Request will default to this controller if none given
    'default_action' => 'home',         // Request will default to this action if none given
    'root' => '//localhost/',       // Setup the web root for the
    'log_dir' => __DIR__ . '\\log\\'
]);

/**
 * Setup the Apps DB connection
 * 
 * Simple MySQL DB Connection info, requires
 * the following format. Again config array can be stored
 * in a separate config file
 */
$app->setDbInfo([
    'host' => 'localhost',
    'user' => 'test',
    'password' => 'test',
    'db' => 'test_db'
]);

/**
 * Setup the Apps routes
 * 
 * Create a routes array for all available paths through
 * the application, these will ALWAYS be a controller/action
 * pair, that is how ion handles requests
 */
$routes = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addGroup('/user', function(FastRoute\RouteCollector $r){
        $r->addRoute('POST', '/login', Sample\App\Action\User\UserLoginAction::class);
        $r->addRoute(['GET', 'POST'], '/view/login', Sample\App\Action\User\ViewLoginAction::class);
    });
});
$app->addRoutingMiddleware($routes);

/**
 * Add Other Middleware
 */
$app->add(new Sample\App\Middleware\SessionMiddleware());

/**
 * Handle the request
 * 
 * Final step is to handle the incoming request
 */
$app->boot();
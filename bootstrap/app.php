<?php

/** 
 * Grab the config
 */

use Yocto\Container;
use Yocto\Views;

use function Yocto\redirect;

$config = require_once __DIR__ . '/config.php';

/**
 * Set Error Reporting Level
 */
error_reporting($config['ENVIRONMENT'] === 'DEVELOPMENT'  ? E_ALL : 0); 
ini_set('display_errors', $config['ENVIRONMENT'] === 'DEVELOPMENT'  ? 1 : 0);


/**
 * Create the container instance
 */
$container = new Container([
    'Config' => $config,
    Views::class => new Views(__DIR__ . '/../src/App/View')
]);

/**
 * Create your app
 * 
 * The config array passed to the create function 
 * can originate from anywhere, create it here or have 
 * a separate config file stored elsewhere
 */
$app = Yocto\App::create($container);

/**
 * Setup the Apps DB connection
 * 
 * Simple MySQL DB Connection info, 
 * uses ConnectionInfo class for format
 */
// TODO : Add YoctoDb support

/**
 * Setup the Apps routes
 * 
 * Create a routes array for all available paths through
 * the application, these will ALWAYS be a controller/action
 * pair, that is how ion handles requests
 */
$r = new Yocto\Router();
$r->get('', fn() => redirect('/view/home'));
$r->addGroup('view', function(Yocto\Router $r) {
    $r->get('home', fn() => Yocto\html(Yocto\render()));
});
$app->setRouter($r);

/**
 * Add Other Middleware
 */
// $app->add();

return $app;
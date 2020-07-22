<?php

/** 
 * Grab the config
 */
$config = require_once __DIR__ . '/config.php';

/**
 * Set Error Reporting Level
 */
error_reporting($config['ENVIRONMENT'] === 'DEVELOPMENT'  ? E_ALL : 0); 
ini_set('display_errors', $config['ENVIRONMENT'] === 'DEVELOPMENT'  ? 1 : 0);

/**
 * Create your app
 * 
 * The config array passed to the create function 
 * can originate from anywhere, create it here or have 
 * a separate config file stored elsewhere
 */
$app = Ion\App::create($config);

/**
 * Setup the Apps DB connection
 * 
 * Simple MySQL DB Connection info, 
 * uses ConnectionInfo class for format
 */
$app->setDbInfo(new Ion\Db\ConnectionInfo('localhost', 'test', 'test', 'test_db'));

/**
 * Setup the Apps routes
 * 
 * Create a routes array for all available paths through
 * the application, these will ALWAYS be a controller/action
 * pair, that is how ion handles requests
 */
$routes = require_once __DIR__ . '/routes.php';
$app->addRoutingMiddleware($routes);

/**
 * Add Other Middleware
 */
$app->add(new Sample\App\Middleware\SessionMiddleware());

return $app;
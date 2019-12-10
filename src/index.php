<?php
/**
 * Require the App class
 */
require_once __DIR__ . '/../ionPHP/src/IonApp.php';

/**
 * Create your app
 * 
 * The config array passed to the create function 
 * can originate from anywhere, create it here or have 
 * a separate config file stored elsewhere
 */
$app = IonApp::create([
    'default_controller' => 'view',    // Request will default to this controller if none given
    'default_action' => 'home',         // Request will default to this action if none given
    'root' => '//localhost/src/'        // Setup the web root for the
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
$app->getRouter()->setRoutes([
    'view' => [ 
        'home', 
        'error', 
        'login' 
    ]
]);

/**
 * Handle the request
 * 
 * Final step is to handle the incoming request
 */
$app->handle();
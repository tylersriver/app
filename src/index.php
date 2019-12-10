<?php
/**
 * Require the App class
 */
require_once __DIR__ . '/../ionPHP/src/IonApp.php';

/**
 * Create your app
 */
$app = IonApp::create([
    'default_controller' => 'view',    // Request will default to this controller if none given
    'default_action' => 'home',         // Request will default to this action if none given
    'root' => '//localhost/src/'        // Setup the web root for the
]);

/**
 * Setup the Apps DB connection
 */
$app->setDbInfo([
    'host' => 'localhost',
    'user' => 'test',
    'password' => 'test',
    'db' => 'test_db'
]);

/**
 * Setup the Apps routes
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
 */
$app->handle();
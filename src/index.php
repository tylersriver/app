<?php
/**
 * Require the App class
 */
require_once __DIR__ . '/../ionPHP/src/IonApp.php';

/**
 * Create your app
 */
$app = IonApp::create([
    'default_controller' => 'pages',
    'default_action' => 'home'
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
$app->setRoutes([
    'pages' => [ 
        'home', 
        'error', 
        'login' 
    ], 
    'user' => [ 
        'login', 
        'logout' 
    ]
]);

/**
 * Handle the request
 */
$app->handle();
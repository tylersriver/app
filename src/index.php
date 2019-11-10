<?php
/**
 * Require the App class
 */
require_once __DIR__ . '/../ionPHP/src/IonApp.php';

/**
 * Create your app
 */
$app = IonApp::create([]);

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
        'overview', 
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
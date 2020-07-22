<?php

/**
 * Step 1. Gather Dependencies
 * Require the Autoloader
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Step 2. Strap in the Application
 * 
 * We setup the application in a seperate directory that is not traversable
 * so we limit the available files and code on the webserver to just this one
 */
$app = require_once __DIR__ . '/../bootstrap/app.php';

/**
 * Step 3. Boot Up
 * 
 * handle the incoming request
 */
$app->boot();
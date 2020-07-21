<?php

/**
 * Setup the Application
 * 
 * We setup the application in a seperate directory that is not traversable
 * so we limit the available files and code on the webserver to just this one
 */
$app = require_once __DIR__ . '/../bootstrap/app.php';

/**
 * Handle the request
 * 
 * handle the incoming request
 */
$app->boot();
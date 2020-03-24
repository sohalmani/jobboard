<?php

/**
 * Load the necessary configuration and bootstrap files.
 */
require_once 'config.php';
require_once 'bootstrap.php';
require_once 'routes.php';

// Run the application
app_run($routes);

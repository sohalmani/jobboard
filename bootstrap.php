<?php

/**
 * Initializes and runs the application.
 *
 * @param array $routes An associative array of routes and their corresponding page names.
 */
function app_run($routes) {
  // Include necessary files
  require_once 'utils/session.php';
  require_once 'utils/conn.php';
  require_once 'utils/helpers.php';
  require_once 'utils/loaders.php';
  require_once 'utils/url.php';

  // Get the current URI
  $uri = getUri();

  // Load the header and footer partials
  loadPartial('header');
  loadPage($uri, $routes);
  loadPartial('footer');
}

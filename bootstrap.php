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
  
  // Check if this is an AJAX request
  if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
      strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    // For AJAX requests, just load the page without header/footer
    loadPage($uri, $routes);
  } else {
    // For regular requests, load with header and footer
    loadPartial('header');
    loadPage($uri, $routes);
    loadPartial('footer');
  }
}

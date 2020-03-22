<?php

/**
 * Routes for the application
 *
 * @var array
 */
$routes = [
  '/'             => 'home',
  '/about'        => 'about',
  '/jobs'         => 'jobs',
  '/job'          => 'job',
  '/job/add'      => 'job/add',
  '/job/edit'     => 'job/edit',
  '/job/delete'   => 'job/delete',

  '/services'     => 'services',
  '/service'      => 'service',
  '/blogs'        => 'blogs',
  '/blog'         => 'blog',
  '/portfolios'   => 'portfolios',
  '/portfolio'    => 'portfolio',
  '/testimonials' => 'testimonials',
  '/faqs'         => 'faqs',
  '/gallery'      => 'gallery',

  '/contact'      => 'contact',
  '/login'        => 'login',
  '/register'     => 'register',
  '/logout'       => 'logout'
];

/**
 * Returns the absolute path for a given relative path.
 *
 * @param string $path The relative path to resolve
 * @return string The absolute path
 */
function basePath($path = '') {
    // Define the base path of the application
    $basePath = __DIR__;
    
    // If no path provided, return base path
    if (empty($path)) {
        return $basePath;
    }
    
    // Ensure path starts without a slash
    $path = ltrim($path, '/');
    
    // Return combined path
    return $basePath . '/' . $path;
}

/**
 * Loads the specified page and its associated entity.
 *
 * @param string $uri The current URI path.
 * @param array $routes An associative array of routes and their corresponding page names.
 */
function loadPage($uri, $routes) {
  if (array_key_exists($uri, $routes)) {
    foreach ($routes as $route => $page) {
      if ($uri === $route) {
        $pageFile = basePath("pages/$page.php");

        if (file_exists($pageFile)) {
          $entityFile = basePath("entities/$page.php");

          if (file_exists($entityFile)) {
            require_once $entityFile;
          }

          require_once $pageFile;
        } else {
          require_once basePath("pages/404.php");
        }
      }
    }
  } else {
    require_once basePath("pages/404.php");
  }
}

/**
 * Gets the current URI path.
 *
 * @return string The current URI path.
 */
function getUri() {
  return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

/**
 * Initializes and runs the application.
 *
 * @param array $routes An associative array of routes and their corresponding page names.
 */
function app_run($routes) {
  // Get the current URI
  $uri = getUri();

  require_once basePath("includes/header.php");
  // Load page based on the URI
  loadPage($uri, $routes);

  require_once basePath("includes/footer.php");
}

// Run the application
app_run($routes);

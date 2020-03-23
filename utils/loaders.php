<?php

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
 * Loads a partial template.
 *
 * @param string $partial The name of the partial template.
 */
function loadPartial($partial) {
  $partialPath = basePath("includes/$partial.php");

  if (file_exists($partialPath)) {
    require_once $partialPath;
  } else {
    echo "Partial '$partial' not found!";
  }
}

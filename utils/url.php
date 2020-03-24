<?php

/**
 * Gets the current URI path.
 *
 * @return string The current URI path.
 */
function getUri() {
  return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

/**
 * Redirects to a given URL.
 *
 * @param string $url The URL to redirect to.
 */
function redirect($url) {
  header("Location: {$url}");
  exit;
}
<?php

/**
 * Gets the current URI path.
 *
 * @return string The current URI path.
 */
function getUri() {
  return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
}

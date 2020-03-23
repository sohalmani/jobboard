<?php

/**
 * Get the base path
 *
 * @param string $path
 * @return string
 */
function basePath($path = '')
{
  return dirname(__DIR__, 1) . '/' . $path;
}

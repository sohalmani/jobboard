<?php

/**
 * Establishes a connection to the database.
 *
 * @return mysqli A MySQLi connection object.
 */
function getDatabaseConnection() {
  // Retrieve database credentials from configuration
  $hostname = DB_HOST;
  $username = DB_USER;
  $password = DB_PASS;
  $database = DB_NAME;

  // Create a new MySQLi connection
  $conn = new mysqli($hostname, $username, $password, $database);

  // Check if the connection was successful
  if (!$conn) {
    // Handle connection failure
    die("Connection failed: " . mysqli_connect_error());
  }

  // Return the connection object
  return $conn;
}

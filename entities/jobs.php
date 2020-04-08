<?php
$conn = getDatabaseConnection();

/**
 * Fetches all jobs from the database or filters based on search criteria.
 *
 * @param mysqli $conn The database connection object.
 * @param array $searchCriteria An associative array of search criteria.
 *
 * @return array|bool An array of jobs or false if an error occurs.
 */
function fetchJobs($conn, $searchCriteria = []) {
  // Base SQL query
  $sql = "SELECT * FROM jobs";

  // Search filters
  $conditions = [];
  $params = [];
  $types = '';

  if (!empty($searchCriteria['keyword'])) {
    $conditions[] = "(title LIKE ? OR company_name LIKE ?)";
    $params[] = '%' . $searchCriteria['keyword'] . '%';
    $params[] = '%' . $searchCriteria['keyword'] . '%';
    $types .= 'ss';
  }

  if (!empty($searchCriteria['region'])) {
    $conditions[] = "region = ?";
    $params[] = $searchCriteria['region'];
    $types .= 's';
  }

  if (!empty($searchCriteria['job_type'])) {
    $conditions[] = "type = ?";
    $params[] = $searchCriteria['job_type'];
    $types .= 's';
  }

  // Add conditions to SQL query
  if (!empty($conditions)) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
  }

  $sql .= " ORDER BY published_on DESC";

  // Prepare the SQL statement
  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt) {
    // Bind parameters if there are any
    if (!empty($params)) {
      mysqli_stmt_bind_param($stmt, $types, ...$params);
    }

    // Execute the query
    mysqli_stmt_execute($stmt);

    // Get the result set
    $result = mysqli_stmt_get_result($stmt);

    // Fetch all rows as an associative array
    $jobs = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free the result set
    mysqli_free_result($result);

    // Return the jobs array
    return $jobs;
  } else {
    // Handle errors
    echo "Error: " . mysqli_error($conn);
    return false;
  }
}

// Function to sanitize input data
function sanitizeInput($data) {
  return htmlspecialchars(trim($data));
}

// Process search form submission
$searchCriteria = [];
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $keyword = isset($_GET['keyword']) ? sanitizeInput($_GET['keyword']) : '';
  $region = isset($_GET['region']) ? sanitizeInput($_GET['region']) : '';
  $jobType = isset($_GET['job_type']) ? sanitizeInput($_GET['job_type']) : '';

  $searchCriteria = [
    'keyword' => $keyword,
    'region' => $region,
    'job_type' => $jobType
  ];
}

// Fetch jobs (with or without search criteria)
$jobs = fetchJobs($conn, $searchCriteria);
$total_jobs = number_format(count($jobs));

// Close connection
mysqli_close($conn);

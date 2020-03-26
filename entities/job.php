<?php

$conn = getDatabaseConnection();

/**
 * Fetches a job from the database based on its ID.
 *
 * @param mysqli $conn The database connection object.
 * @param int $jobId The ID of the job to fetch.
 *
 * @return array|null The job data as an associative array, or null if not found.
 */
function fetchJobById($conn, $jobId) {
  if (!$jobId) return null;

  $sql = "SELECT *, 
          DATE_FORMAT(published_on, '%M %d, %Y') as formatted_date,
          DATE_FORMAT(application_deadline, '%M %d, %Y') as formatted_deadline 
          FROM jobs WHERE id = ?";

  $stmt = mysqli_prepare($conn, $sql);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $jobId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $job = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $job;
  }

  return null;
}

/**
 * Extracts the last word from a given string.
 *
 * @param string $title The title to extract the last word from.
 * @return string The last word of the title.
 */
function getLastWord($title) {
  $words = explode(' ', trim($title));
  return end($words);
}

/**
 * Fetches related jobs based on a similar job title, company, or type.
 *
 * @param mysqli $conn The database connection object.
 * @param array $job The job data to find similar jobs for.
 *
 * @return array An array of related jobs, or an empty array if none are found.
 */
function fetchRelatedJobs($conn, $job) {
  $sql = "SELECT *, DATE_FORMAT(published_on, '%M %d, %Y') as formatted_date 
          FROM jobs 
          WHERE (company = ? OR type = ? OR title LIKE ?) 
          AND id != ? 
          ORDER BY published_on DESC 
          LIMIT 5";
  
  $stmt = mysqli_prepare($conn, $sql);
  
  if ($stmt) {
    $searchTerm = "%" . getLastWord($job['title']) . "%";
    mysqli_stmt_bind_param($stmt, "sssi", 
      $job['company'], 
      $job['type'], 
      $searchTerm,
      $job['id']
    );
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $relatedJobs = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $relatedJobs[] = $row;
    }
    mysqli_stmt_close($stmt);
    return $relatedJobs;
  }
  
  return [];
}

// Get job ID from URL and fetch job data
$jobId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$job = fetchJobById($conn, $jobId);

// Redirect to 404 if job not found
if (!$job) {
  redirect('/404');
}

// Fetch related jobs
$relatedJobs = fetchRelatedJobs($conn, $job);

// Close connection
mysqli_close($conn);

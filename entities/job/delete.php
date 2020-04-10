<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Check if the user is logged in
  if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized access. Please log in.']);
    exit;
  }

  // Decode the JSON request body
  $data = json_decode(file_get_contents("php://input"), true);

  // Validate the input data
  if (!isset($data['action']) || $data['action'] !== 'delete' || !isset($data['jobId'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid request data.']);
    exit;
  }

  try {
    $jobId = intval($data['jobId']);
    $conn = getDatabaseConnection();

    // First check if the job exists and belongs to the current user
    $checkSql = "SELECT company_logo FROM jobs WHERE id = ? AND user_id = ? LIMIT 1";
    $checkStmt = $conn->prepare($checkSql);
    
    if (!$checkStmt) {
      throw new Exception("Failed to prepare the check query.");
    }

    $checkStmt->bind_param("ii", $jobId, $_SESSION['user_id']);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    $job = $result->fetch_assoc();
    $checkStmt->close();

    if (!$job) {
      http_response_code(404);
      echo json_encode(['success' => false, 'message' => 'Job not found or you do not have permission to delete it.']);
      exit;
    }

    // Delete the job
    $sql = "DELETE FROM jobs WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
      throw new Exception("Failed to prepare the delete query.");
    }

    $stmt->bind_param("ii", $jobId, $_SESSION['user_id']);
    
    if (!$stmt->execute()) {
      throw new Exception("Failed to delete the job.");
    }

    // If job was deleted successfully, also delete the company logo file
    if (!empty($job['company_logo'])) {
      $logoPath = basePath('assets/images/' . $job['company_logo']);
      if (file_exists($logoPath)) {
        unlink($logoPath);
      }
    }

    $stmt->close();
    $conn->close();

    http_response_code(200);
    echo json_encode(['success' => true, 'message' => 'Job deleted successfully.']);

  } catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
  }

} else {
  http_response_code(405);
  echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

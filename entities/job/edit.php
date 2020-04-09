<?php
// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
  redirect('/login');
}

$conn = getDatabaseConnection();

// Fetch the job details if an ID is provided in the URL
$jobData = [];
if (isset($_GET['id'])) {
  $jobId = intval($_GET['id']); // Ensure job ID is an integer
  $query = "SELECT * FROM jobs WHERE id = ? AND user_id = ?";
  $stmt = mysqli_prepare($conn, $query);

  if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ii", $jobId, $_SESSION['user_id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
      $jobData = mysqli_fetch_assoc($result);
    } else {
      redirect('/404');
    }

    mysqli_stmt_close($stmt);
  }
}

// Handle form submission to update job details
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    // Handle file upload first
    $companyLogo = $jobData['company_logo']; // Keep existing logo by default
    
    if (isset($_FILES['company_logo']) && $_FILES['company_logo']['error'] !== UPLOAD_ERR_NO_FILE) {
      [$success, $result] = handleFileUpload($_FILES['company_logo'], basePath('assets/images/'));
      if ($success) {
        $companyLogo = $result;
      } else {
        throw new Exception($result);
      }
    }

    // Get and sanitize form data
    $title = sanitizeInput($_POST['job_title']);
    $type = sanitizeInput($_POST['job_type']);
    $location = sanitizeInput($_POST['job_location']);
    $region = sanitizeInput($_POST['job_region']);
    $experience = sanitizeInput($_POST['experience']);
    $salary = sanitizeInput($_POST['salary']);
    $vacancies = (int)$_POST['vacancies'];
    $applicationDeadline = sanitizeInput($_POST['application_deadline']);
    $description = $_POST['job_description'];
    $responsibilities = $_POST['roles_responsibilities'];
    $requirements = $_POST['education_experience'];
    $benefits = $_POST['perks_benefits'];
    $companyName = sanitizeInput($_POST['company_name']);
    $companyWebsite = sanitizeInput($_POST['company_website'] ?? '');
    $companyFacebook = sanitizeInput($_POST['company_facebook'] ?? '');
    $companyTwitter = sanitizeInput($_POST['company_twitter'] ?? '');
    $companyLinkedin = sanitizeInput($_POST['company_linkedin'] ?? '');

    // Validate required fields
    $errors = [];
    $requiredFields = [
      'job_title' => $title,
      'job_type' => $type,
      'job_location' => $location,
      'job_region' => $region,
      'experience' => $experience,
      'salary' => $salary,
      'vacancies' => $vacancies,
      'application_deadline' => $applicationDeadline,
      'job_description' => $description,
      'company_name' => $companyName
    ];

    foreach ($requiredFields as $fieldName => $value) {
      if (empty($value)) {
        $errors[] = ucwords(str_replace('_', ' ', $fieldName));
      }
    }

    if (!empty($errors)) {
      throw new Exception("Please fill in " . implode(", ", $errors));
    }

    // Update database
    $sql = "UPDATE jobs SET 
            title = ?, type = ?, location = ?, region = ?, experience = ?, 
            salary = ?, vacancies = ?, application_deadline = ?, description = ?, 
            responsibilities = ?, requirements = ?, benefits = ?, company_name = ?, 
            company_logo = ? WHERE id = ? AND user_id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssssssii",
      $title, $type, $location, $region, $experience,
      $salary, $vacancies, $applicationDeadline, $description,
      $responsibilities, $requirements, $benefits, $companyName,
      $companyLogo, $jobId, $_SESSION['user_id']
    );

    if ($stmt->execute()) {
      redirect('/job?id=' . $jobId);
    } else {
      throw new Exception($stmt->error);
    }
  } catch (Exception $e) {
    $_SESSION['form_error'] = $e->getMessage();
    $_SESSION['form_data'] = $_POST;
    redirect('/job/edit?id=' . $jobId);
  } finally {
    if (isset($stmt)) {
      $stmt->close();
    }
    if (isset($conn)) {
      $conn->close();
    }
  }
}

// Function to handle file upload
function handleFileUpload($file, $targetDir) {
  // Check if file was actually uploaded
  if ($file['error'] === UPLOAD_ERR_NO_FILE) {
    return [false, "Please select a company logo"];
  }

  $targetFile = $targetDir . basename($file["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
  
  // Check if image file is a actual image
  if(isset($_POST["submit"])) {
    $check = getimagesize($file["tmp_name"]);
    if($check === false) {
      return [false, "File is not an image."];
    }
  }
  
  // Check file size
  if ($file["size"] > 500000) {
    return [false, "File is too large (max 500KB)."];
  }
  
  // Allow jpg file format only
  if($imageFileType != "jpg") {
    return [false, "Company logo must be a JPG file."];
  }
  
  // Generate sequential filename
  $prefix = 'job_logo_';
  $counter = 1;
  while (file_exists($targetDir . $prefix . $counter . '.' . $imageFileType)) {
    $counter++;
  }
  $newFilename = $prefix . $counter . '.' . $imageFileType;
  $targetFile = $targetDir . $newFilename;
  
  if (move_uploaded_file($file["tmp_name"], $targetFile)) {
    return [true, $newFilename];
  } else {
    return [false, "Failed to upload file."];
  }
}

// Function to sanitize input data
function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

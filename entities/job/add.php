<?php
// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
  redirect('/login');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $conn = getDatabaseConnection();
  
  // Function to handle file upload
  function handleFileUpload($file, $targetDir) {
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
      return [false, "Only JPG file is allowed."];
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

  // Sanitize input data
  function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  try {
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
      throw new Exception("Please fill in " . implode(", ", $errors) . " & Company Logo.");
    }

    // Handle file upload
    $companyLogo = '';
    
    // Check if file was actually uploaded
    if (isset($_FILES['company_logo'])) {
      [$success, $result] = handleFileUpload($_FILES['company_logo'], basePath('assets/images/'));
      if ($success) {
        $companyLogo = $result;
      } else {
        throw new Exception($result);
      }
    }

    // Insert into database
    $sql = "INSERT INTO jobs (
      user_id, title, type, location, region, experience, salary, vacancies, application_deadline,
      description, responsibilities, requirements, benefits, company_name, company_logo
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssssisssssss",
      $_SESSION['user_id'],
      $title,
      $type,
      $location,
      $region,
      $experience,
      $salary,
      $vacancies,
      $applicationDeadline,
      $description,
      $responsibilities,
      $requirements,
      $benefits,
      $companyName,
      $companyLogo
    );

    if ($stmt->execute()) {
      // Redirect to the newly created job posting
      redirect('/job?id=' . $stmt->insert_id);
    } else {
      throw new Exception($stmt->error);
    }
  } catch (Exception $e) {
    $_SESSION['form_error'] = $e->getMessage();
    $_SESSION['form_data'] = $_POST;
    redirect('/job/add');
  } finally {
    if (isset($stmt)) {
      $stmt->close();
    }
    if (isset($conn)) {
      $conn->close();
    }
  }
}

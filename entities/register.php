<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
      throw new Exception('Invalid request, please try again.');
    }

    // Validate required fields
    $required_fields = ['email', 'password', 'confirm_password'];
    foreach ($required_fields as $field) {
      if (empty($_POST[$field])) {
        throw new Exception('All fields are required.');
      }
    }

    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!$email) {
      throw new Exception('Please enter a valid email address.');
    }

    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Password validation
    if (strlen($password) < 8) {
      throw new Exception('Password must be at least 8 characters long.');
    }

    if (!preg_match("/[A-Z]/", $password)) {
      throw new Exception('Password must contain at least one uppercase letter.');
    }

    if (!preg_match("/[a-z]/", $password)) {
      throw new Exception('Password must contain at least one lowercase letter.');
    }

    if (!preg_match("/[0-9]/", $password)) {
      throw new Exception('Password must contain at least one number.');
    }

    if ($password !== $confirmPassword) {
      throw new Exception('Passwords do not match.');
    }

    $conn = getDatabaseConnection();

    // Check if email already exists
    $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    if (!$checkStmt) {
      throw new Exception('An error occurred. Please try again later.');
    }

    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    
    if ($result->num_rows > 0) {
      throw new Exception('This email is already registered. Please use a different email or try logging in.');
    }
    $checkStmt->close();

    // Password hashing with strong options
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

    // Prepare and execute SQL query
    $sql = "INSERT INTO users (email, password, status, created_at) VALUES (?, ?, 'active', NOW())";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
      throw new Exception('An error occurred while creating your account.');
    }

    $stmt->bind_param("ss", $email, $hashedPassword);
    
    if (!$stmt->execute()) {
      throw new Exception('Failed to create account. Please try again.');
    }

    // Set success message and log the user in
    $_SESSION['success'] = 'Your account has been created successfully!';
    $_SESSION['user_id'] = $stmt->insert_id;
    $_SESSION['user_email'] = $email;

    // Regenerate session ID for security
    session_regenerate_id(true);

    redirect('/');

  } catch (Exception $e) {
    $_SESSION['error'] = $e->getMessage();
    $_SESSION['form_data'] = $_POST;
    redirect('/register');
  } finally {
    if (isset($stmt)) {
      $stmt->close();
    }
    if (isset($checkStmt)) {
      $checkStmt->close();
    }
    if (isset($conn)) {
      $conn->close();
    }
  }
}

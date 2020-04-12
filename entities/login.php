<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    // Validate CSRF token
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
      throw new Exception('Invalid request, please try again.');
    }

    // Validate required fields
    if (empty($_POST['email']) || empty($_POST['password'])) {
      throw new Exception('Email and password are required.');
    }

    // Validate email format
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!$email) {
      throw new Exception('Please enter a valid email address.');
    }

    $password = $_POST['password'];
    
    // Validate password length
    if (strlen($password) < 6) {
      throw new Exception('Password must be at least 6 characters long.');
    }

    $conn = getDatabaseConnection();

    // Prepare and execute SQL query to check user credentials
    $sql = "SELECT id, password, status FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
      throw new Exception('An error occurred. Please try again later.');
    }
    
    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
      throw new Exception('An error occurred while verifying credentials.');
    }

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $hashedPassword = $row['password'];

      // Check if account is active
      if (isset($row['status']) && $row['status'] !== 'active') {
        throw new Exception('Your account is not active. Please check your email for activation instructions.');
      }

      // Verify the password using password_verify()
      if (password_verify($password, $hashedPassword)) {
        // Successful login
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_email'] = $email;
        
        // Regenerate session ID for security
        session_regenerate_id(true);
        
        // Clear any existing error messages
        unset($_SESSION['error']);
        
        // Set success message
        $_SESSION['success'] = 'Welcome back!';

        // Redirect to home
        redirect("/");
      } else {
        throw new Exception('Invalid email or password.');
      }
    } else {
      throw new Exception('Invalid email or password.');
    }
  } catch (Exception $e) {
    $_SESSION['error'] = $e->getMessage();
    redirect('/login');
  } finally {
    if (isset($stmt)) {
      $stmt->close();
    }
    if (isset($conn)) {
      $conn->close();
    }
  }
}

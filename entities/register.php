<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $conn = getDatabaseConnection();

  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];

  // Validate input data
  if ($password !== $confirmPassword) {
    echo "Passwords do not match.";
    exit;
  }

  // Validate email format
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format.";
    exit;
  }

  // Password hashing
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Prepare and execute SQL query
  $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $email, $hashedPassword);
  $stmt->execute();

  if ($stmt->error) {
    echo "Error: " . $stmt->error;
  } else {
    redirect('/');
  }

  $stmt->close();
  $conn->close();
}

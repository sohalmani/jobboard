<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $conn = getDatabaseConnection();

  $email = $_POST['email'];
  $password = $_POST['password'];

  // Prepare and execute SQL query to check user credentials
  $sql = "SELECT id, password FROM users WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashedPassword = $row['password'];

    // Verify the password using password_verify()
    if (password_verify($password, $hashedPassword)) {
      // Successful login
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_email'] = $email;

      // Redirect to home
      redirect("/");
    } else {
      echo "Incorrect password.";
    }
  } else {
    echo "User not found.";
  }

  $stmt->close();
  $conn->close();
}

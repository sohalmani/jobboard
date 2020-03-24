<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $conn = getDatabaseConnection();

  $firstName = $_POST['first_name'];
  $lastName = $_POST['last_name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Prepare and execute SQL query to insert contact information into a database
  $sql = "INSERT INTO contacts (first_name, last_name, email, subject, message) VALUES (?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $firstName, $lastName, $email, $subject, $message);
  $stmt->execute();

  if ($stmt->error) {
    echo "Error: " . $stmt->error;
  } else {
    // Send email confirmation
    $to = $email;
    $subject = "Your Message Has Been Sent";
    $message = "Thank you for your message. We will get back to you soon.";
    $headers = "From: JobBoard <" . EMAIL_USER . ">";

    if (mail($to, $subject, $message, $headers)) {
      // Redirect to homepage
      redirect('/');
    } else {
      echo "Error sending email confirmation.";
    }
  }

  $stmt->close();
  $conn->close();
}

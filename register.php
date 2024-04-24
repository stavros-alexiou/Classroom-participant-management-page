<?php

session_start();
include 'db_connection.php'; // Use a separate file to handle DB connection

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username=$_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


// Validate input
if ($password !== $confirm_password) {
  echo "Passwords do not match.";
  exit();
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $password);

// Execute SQL statement
if ($stmt->execute() === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connections
$stmt->close();
$conn->close();
?>

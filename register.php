<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "users_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password != $confirm_password) {
        echo "<script>alert('Passwords do not match!');</script>";
        // Redirect to register.html after 5 seconds
        header("refresh:3;url=register.html");
        exit;
    }

    // Insert user into the database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!');</script>";
        // Redirect to index.html after 5 seconds
        header("refresh:3;url=index.html");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

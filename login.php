<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "users_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $email;
        
        // Update 'is_logged_in' flag for the user
        $update_sql = "UPDATE users SET is_logged_in = 1 WHERE email = '$email'";
        mysqli_query($conn, $update_sql);
        
        // Check if user is admin or not
        if ($row['is_admin'] == 1) {
            // User is admin, redirect to homepage.html
            header("Location: homepage.html");
            exit();
        } else {
            // User is not admin, redirect to test.html
            header("Location: user_page.html");
            exit();
        }
    } else {
        echo "Invalid email or password";
    }
} else {
    echo "Email and password are required";
}

$conn->close();
?>

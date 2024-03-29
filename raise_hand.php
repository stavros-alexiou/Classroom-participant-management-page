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

// Check if the user is logged in
if(isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    // Retrieve the current value of 'raise_hand' flag for the logged-in user
    $select_sql = "SELECT raise_hand FROM users WHERE email = '$email'";
    $result = $conn->query($select_sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Toggle the value of 'raise_hand' flag
        $new_raise_hand_value = ($row['raise_hand'] == 1) ? 0 : 1;
        // Update 'raise_hand' flag to the new value
        $update_sql = "UPDATE users SET raise_hand = $new_raise_hand_value WHERE email = '$email'";
        if ($conn->query($update_sql) === TRUE) {
            echo "Hand state toggled successfully.";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "User not logged in.";
}

$conn->close();
?>

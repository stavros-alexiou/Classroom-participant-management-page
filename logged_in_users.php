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

// Fetch currently logged in users
$sql = "SELECT * FROM users WHERE is_logged_in = 1";
$result = $conn->query($sql);

// Display the list of logged-in users with raise_hand status
if ($result->num_rows > 0) {
    echo "<h2>Logged-in Users:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        // Check raise_hand status and display notification mark accordingly
        $raise_hand_class = ($row['raise_hand'] == 1) ? 'raise-hand' : '';
        echo "<li class='$raise_hand_class'>" . $row['email'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No users are currently logged in.";
}

// Display the list of logged-in users
if ($result->num_rows > 0) {
    // echo "<h2>Logged-in Users:</h2>";
    // echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['email'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No users are currently logged in.";
}

$conn->close();
?>

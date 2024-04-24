<?php
$servername = "localhost";
$username = "root";
$password = "12345678!a";
$database = "users_db";
$port = "3306";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If this script is included in other PHP scripts, they will all share this database connection.
?>

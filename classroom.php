<?php
include 'db_connection.php';
session_start();

// Retrieve the class value from the AJAX request
$value = $_POST['class'];

// Retrieve the user's email from the session
$user_email = isset($_SESSION['email']) ? $_SESSION['email'] : '';

// Check if the user's email is provided
if (!empty($user_email)) {
    // Get the user ID based on the email
    $dsn = 'mysql:host=localhost;dbname=users_db';
    $username = 'root';
    $password = '12345678!a';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $user_email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $user_id = $user['id'];

            // Update the database with the received class value based on the user's ID
            $sql = "UPDATE users SET class = :class WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':class', $value);
            $stmt->bindParam(':id', $user_id);
            $stmt->execute();
            echo "Database updated successfully";
        } else {
            echo "User not found"; // Handle case where user with the provided email is not found
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "User email not provided";
}
?>

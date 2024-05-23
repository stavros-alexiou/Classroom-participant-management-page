<?php
session_start();
include 'db_connection.php'; // Ensure this includes proper error handling and establishes a PDO connection

header('Content-Type: application/json'); // This should be set before any output

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

$userId = $_SESSION['user_id'];
$stmt = $pdo->prepare('SELECT username FROM users WHERE id = ?');
$stmt->execute([$userId]);
$user = $stmt->fetch();

if ($user) {
    echo json_encode(['username' => $user['username']]);
} else {
    echo json_encode(['error' => 'User not found']);
}
?>



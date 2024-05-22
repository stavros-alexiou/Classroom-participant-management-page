<link rel="stylesheet" type="text/css" href="index.css">
<?php
session_start();
include 'db_connection.php'; // Use a separate file to handle DB connection}

// Fetch currently logged in users
$sql = "SELECT * FROM users WHERE is_logged_in = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Συνδεδεμένοι Χρήστες:</h2>";
    echo "<div class='user-container'>";
    echo "<ul class='user-list'>";
    while ($row = $result->fetch_assoc()) {
        // Check raise_hand status and display notification mark accordingly
        $raise_hand_class = ($row['raise_hand'] == 1) ? 'raise-hand' : '';
        echo "<li class='user $raise_hand_class'>" . $row['username'] .  " "  . $row['class'] . "</li>";
    }
    echo "</ul>";
    echo "</div>";
} else {
    echo "No users are currently logged in.";
}

$conn->close();
?>

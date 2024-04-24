<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    header('Location: index.html'); // Redirect to login page if not logged in
    exit;
}


if (!isset($_SESSION['email']) || $_SESSION['email'] !== "admin@gep.com") {
echo '

header("Location: index.html");

}

?>

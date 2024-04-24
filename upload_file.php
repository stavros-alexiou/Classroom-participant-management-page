<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    echo "Unauthorized access.";
    exit;
}

$target_dir = "Content_sharing/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
    $file = $_FILES['fileToUpload'];
    $filename = basename($file['name']);
    $target_file = $target_dir . $filename;

    if ($file['size'] > 5000000) {
        echo "Error: File is too large.";
        exit;
    }

    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (!in_array($fileType, ['pdf', 'ppt', 'pptx', 'doc', 'docx', 'html'])) {
        echo "Error: Only PDF, PPT, DOC, and HTML files are allowed.";
        exit;
    }

    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        echo "The file " . htmlspecialchars($filename) . " has been uploaded.";
    } else {
        echo "An error occurred trying to upload your file.";
    }
} else {
    echo "No file was uploaded or an error occurred.";
}
?>

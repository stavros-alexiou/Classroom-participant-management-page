<?php
/*
session_start();
include 'db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: login_page.php'); // Redirect to login page if not logged in
    exit;
}

// Sanitize the file input to avoid directory traversal issues
$file = 'Content_sharing/' . basename($_GET['file']); // Ensures the file path stays within the intended directory

// Check if the file exists and is readable
if (file_exists($file) && is_readable($file)) {
    // Set headers for a file download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream'); // This type forces the browser to download
    header('Content-Disposition: attachment; filename="' . basename($file) . '"'); // Suggests a filename to save as
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file)); // The size of the file
    ob_clean(); // Clean (erase) the output buffer
    flush(); // Flush the output buffer
    readfile($file); // Read the file and write it to the output buffer
    exit;
} else {
    echo 'Error: File not found.'; // Error handling if the file isn't found
}
*/

session_start();
include 'db_connection.php';

// Check if the user is logged in
if (!isset($_SESSION['logged_in'])) {
    header('Location: login_page.php'); // Redirect to login page if not logged in
    exit;
}

try {
    // Sanitize the file input to avoid directory traversal issues
    $requestedFile = basename($_GET['file']);
    $file = 'Content_sharing/' . $requestedFile; // Ensures the file path stays within the intended directory
    $fullPath = realpath($file);

    if (!$fullPath) {
        throw new Exception("File path could not be resolved from input: $requestedFile");
    }

    // Check if the file exists and is readable
    if (!file_exists($fullPath) || !is_readable($fullPath)) {
        throw new Exception("File does not exist or is not readable: $fullPath");
    }

    // Set headers for a file download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream'); // This type forces the browser to download
    header('Content-Disposition: attachment; filename="' . basename($fullPath) . '"'); // Suggests a filename to save as
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fullPath)); // The size of the file
    ob_clean(); // Clean (erase) the output buffer
    flush(); // Flush the output buffer
    readfile($fullPath); // Read the file and write it to the output buffer
    exit;
} catch (Exception $e) {
    error_log($e->getMessage());
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>
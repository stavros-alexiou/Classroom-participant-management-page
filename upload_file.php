<?php
session_start();
include 'db_connection.php';

if ($_SESSION['email'] === 'admin@gep.com'){

$target_dir = "Content_sharing/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
    $file = $_FILES['fileToUpload'];
    $filename = basename($file['name']);
    $target_file = $target_dir . $filename;

    if ($file['size'] > 5000000) {
        echo "<script type=\"text/javascript\">window.alert('The file is too large');window.location.href = '/homepage.html';</script>";
        exit;
    }


    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        echo "<script type=\"text/javascript\">window.alert('The file " . htmlspecialchars($filename) . " has been uploaded.');window.location.href = '/homepage.html';</script>";

         echo "The file " . htmlspecialchars($filename) . " has been uploaded.";
    } else {
          echo "<script type=\"text/javascript\">window.alert('An error occurred trying to upload your file.');window.location.href = '/homepage.html';</script>";

    }
} else {
     echo "<script type=\"text/javascript\">window.alert('No files where selected to be uploaded.');window.location.href = '/homepage.html';</script>";
    

}
}
else{
    $target_dir = "User_sharing/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] == 0) {
    $file = $_FILES['fileToUpload'];
    $filename = basename($file['name']);
    $target_file = $target_dir . $filename;

    if ($file['size'] > 5000000) {
        echo "<script type=\"text/javascript\">window.alert('The file is too large');window.location.href = '/user_page.html';</script>";
        exit;
    }


    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        echo "<script type=\"text/javascript\">window.alert('The file " . htmlspecialchars($filename) . " has been uploaded.');window.location.href = '/user_page.html';</script>";
    } else {
        echo "<script type=\"text/javascript\">window.alert('An error occurred trying to upload your file.');window.location.href = '/user_page.html';</script>";
    }
} else {
    echo "<script type=\"text/javascript\">window.alert('No files where selected to be uploaded.');window.location.href = '/user_page.html';</script>";

}
}

?>

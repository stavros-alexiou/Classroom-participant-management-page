<?php
session_start();

$files = scandir('C:\xampp\htdocs\User_sharing');
$result = [];

foreach ($files as $file) {
    if ($file !== "." && $file !== "..") {
        array_push($result, $file);
    }
}

header('Content-Type: application/json');
echo json_encode($result);


?>

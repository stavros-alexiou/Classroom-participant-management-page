<?php
session_start();

$files = scandir('C:\Website\Content_sharing');
$result = [];

foreach ($files as $file) {
    if ($file !== "." && $file !== "..") {
        array_push($result, $file);
    }
}

header('Content-Type: application/json');
echo json_encode($result);
?>

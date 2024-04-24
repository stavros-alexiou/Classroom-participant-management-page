<?php 
session_start();
if (isset($_SESSION['email'])) {
    if ($_SESSION['email'] === 'admin@gep.com') {
        $_SESSION['admin_logged_in'] = true;  // Set an admin flag in the session
        echo 'adminloggedin';
    } else {
        $_SESSION['admin_logged_in'] = false;  // Ensure the flag is set but false for non-admins
        echo 'loggedin';
    }
} else {
    $_SESSION['admin_logged_in'] = false;  // Default to false if not logged in at all
    echo 'notloggedin';
}
?>

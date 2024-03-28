<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "users_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // Set user as logged in
        $_SESSION['email'] = $email;
        $update_sql = "UPDATE users SET is_logged_in = 1 WHERE email = '$email'";
        mysqli_query($conn, $update_sql);
        header("Location: homepage.html");
        exit();
    } else {
        echo "Invalid email or password";
    }
} else {
    echo "Email and password are required";
}

$conn->close();
?>

<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "users_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle disconnection
if(isset($_GET['logout'])) {
    $email = $_SESSION['email'];
    $update_sql = "UPDATE users SET is_logged_in = 0 WHERE email = '$email'";
    mysqli_query($conn, $update_sql);
    session_destroy();
    header("Location: index.html");
    exit();
}

// Fetch currently logged in users
$sql = "SELECT * FROM users WHERE is_logged_in = 1";
$result = $conn->query($sql);

// Create list of logged-in users
$logged_in_users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $logged_in_users[] = $row['email'];
    }
}

$conn->close();
?>

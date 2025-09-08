<?php
// Step 0: Show all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Step 1: DB Connection
$conn = mysqli_connect("localhost", "root", "", "user_system");

// Step 2: Connection Check
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 3: Form check
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // SQL query
    $query = "INSERT INTO user (username, email, password) 
              VALUES ('$username', '$email', '$hashedPassword')";

    // Execute
    $execute = mysqli_query($conn, $query);

    if ($execute) {
        echo "<script>alert('Registration Successful!');</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
header("Location:login.html");
exit;
?>
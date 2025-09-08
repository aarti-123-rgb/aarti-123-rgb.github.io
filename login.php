<?php
session_start();

// Show all errors (for debugging)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Connect to DB
$conn = mysqli_connect("localhost", "root", "", "user_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. Check if login button is clicked
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 3. Fetch user from DB
    $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    // 4. Check if user exists
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // DEBUG: Print passwords
        // echo "Entered: $password<br>";
        // echo "Hashed: " . $row['password'];

        // 5. Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            echo "<script>alert('Login successful!'); window.location.href='dashboard2.php';</script>";
            exit;
        } else {
            echo "<script>alert('Incorrect Password'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('Email not found'); window.location.href='login.html';</script>";
    }
}
?>
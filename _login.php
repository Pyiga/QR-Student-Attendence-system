<?php
session_start(); // Start the session

// Include the database connection file
require_once 'database.php';

// Dummy user data (replace this with your authentication logic)
$validUsers = array(
    'admin' => 'admin_password',
    'lecturer' => 'lecturer_password'
);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if user exists and password is correct
    if (array_key_exists($role, $validUsers) && $validUsers[$role] === $password) {
        // Set session variables
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Redirect based on role
        if ($role === 'admin') {
            header("Location: admin_dashboard.php");
            exit();
        } elseif ($role === 'lecturer') {
            header("Location: lecturer_dashboard.php");
            exit();
        }
    } else {
        // Redirect back to login page with error message
        header("Location: login.php?error=invalid_credentials");
        exit();
    }
}
?>

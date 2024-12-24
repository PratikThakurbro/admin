<?php
// login_process.php

session_start(); // Start the session to store error messages

// Database connection
$servername = "127.0.0.1:4306";
$username = "root";
$password = "";
$dbname = "dashboard_master"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if (isset($_POST['username']) && isset($_POST['password'])) {
    $form_username = $_POST['username']; // Username from the form
    $form_password = $_POST['password']; // Password from the form

    // Trim spaces to avoid issues with comparison
    $form_password = trim($form_password); // Trim entered password
    $sql = "SELECT * FROM users WHERE username = '$form_username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, check the password
        $row = $result->fetch_assoc();

        // Trim stored password to avoid spaces/newlines
        $stored_password = trim($row['password']); // Trim stored password

        // Compare the entered password with the stored password (plain text comparison)
        if ($form_password === $stored_password) {
            // Password is correct, login successful, redirect to dashboard
            header("Location: View/dashboard.php");
            exit();
        } else {
            // Invalid password, set error message
            $_SESSION['error_message'] = "Invalid username or password.";
            header("Location: index.php"); // Redirect back to login form
            exit();
        }
    } else {
        // No user found, set error message
        $_SESSION['error_message'] = "Invalid username or password.";
        header("Location: index.php"); // Redirect back to login form
        exit();
    }
} else {
    // Error message if form data is missing
    $_SESSION['error_message'] = "Username or password not set.";
    header("Location: index.php"); // Redirect back to login form
    exit();
}

$conn->close();
?>

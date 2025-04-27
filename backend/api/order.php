<?php
session_start();
include('../db/connection.php'); // Make sure this path is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get email and password from POST request
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Find user by email
    $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Check password (Simple check, you can add password_hash later for more security)
        if ($password === $user['password']) {
            // Login success
            $_SESSION['user_id'] = $user['id']; // Save user id to session
            $_SESSION['username'] = $user['username']; // Optional: Save username

            // Redirect to home or products page
            header('Location: ../../frontend/index.index.php');
            exit;
        } else {
            echo "❌ Incorrect password.";
        }
    } else {
        echo "❌ User not found with this email.";
    }
} else {
    echo "Invalid Request.";
}
?>

<?php
session_start();
include '../db/connection.php'; // Correct your connection path

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password =$_POST['password']; // no need to escape password (we hash-verify it)

    // 1. Find the user by username
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // 2. User exists
        $user = mysqli_fetch_assoc($result);

        // 3. Verify password
        if (password_verify($password, $user['password'])) {
            // ✅ Password is correct
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to home page or dashboard
            header('Location: ../../frontend/index.php');
            exit();
        } else {
            // ❌ Wrong password
            echo "Invalid username or password.";
        }
    } else {
        // ❌ User not found
        echo "Invalid username or password.";
    }
}
?>

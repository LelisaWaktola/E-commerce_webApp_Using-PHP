<?php
session_start();
include('../db/connection.php'); // make sure this is correct

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = intval($_POST['product_id']);

    if (!isset($_SESSION['user_id'])) {
        // User is not logged in
        header('Location: ../../frontend/login.html');
        exit;
    }
    
    $user_id = $_SESSION['user_id']; // use logged-in user's ID
    $product_id = intval($_POST['product_id']);
    // Insert into cart table
    $query = "INSERT INTO carts (user_id, product_id, quantity) VALUES ($user_id, $product_id, 1)";
    
    if (mysqli_query($conn, $query)) {
        echo "Product added to cart successfully!";
        header("Location: ../../frontend/cart.html"); // Redirect to cart page (optional)
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>

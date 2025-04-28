<?php
session_start();
include('../db/connection.php'); // make sure this is correct

$productId = (int)$_POST['product_id'];

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_id']);

if ($isLoggedIn) {
    $userId = (int)$_SESSION['user_id'];

    // First, check if the product already exists in the user's cart
    $stmt = $conn->prepare("SELECT quantity FROM carts WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $userId, $productId); // "ii" means 2 integers
    $stmt->execute();
    $result = $stmt->get_result(); // Fetch the result set
    
    $item = $result->fetch_assoc(); // Now fetch associative array
    

    if ($item) {
        // Product already in cart, update quantity
        $stmt = $conn->prepare("UPDATE carts SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?");
        $stmt->execute([$userId, $productId]);
        header("Location: ../../frontend/index.php");
    } else {
        // Product not in cart, insert new record
        $stmt = $conn->prepare("INSERT INTO carts (user_id, product_id, quantity) VALUES (?, ?, 1)");
        $stmt->execute([$userId, $productId]);
        header("Location: ../../frontend/index.php");
    }
} else {
    // User not logged in, store cart in session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += 1;
    } else {
        $_SESSION['cart'][$productId] = 1;
    }
    header("Location: ../../frontend/login.html");
    exit();
}
?>

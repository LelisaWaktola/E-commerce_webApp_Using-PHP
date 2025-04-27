<?php
// 1. Connect to database
include('../db/connection.php'); // Make sure this path is correct!!

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 2. Get the product ID from the form
    $product_id = intval($_POST['product_id']);

    // 3. Check if the product exists
    $product_query = mysqli_query($conn, "SELECT * FROM products WHERE id = $product_id");
    $product = mysqli_fetch_assoc($product_query);

    if ($product) {
        // 4. Insert into cart table
        $insert_query = mysqli_query($conn, "INSERT INTO cart (product_id, quantity) VALUES ($product_id, 1)");

        if ($insert_query) {
            // 5. Redirect to cart page or show success message
            header("Location: ../../frontend/cart.html");
            exit();
        } else {
            echo "Failed to add product to cart.";
        }
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid request.";
}
?>

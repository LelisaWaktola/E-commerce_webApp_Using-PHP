<?php
session_start();
require_once '../db/connection.php';

$cartItems = [];

if (isset($_SESSION['user_id'])) {
    // Logged-in user, fetch from database
    $userId = (int)$_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT c.product_id, c.quantity, p.name, p.price, p.image
                            FROM carts c
                            JOIN products p ON c.product_id = p.id
                            WHERE c.user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
    }
    $stmt->close();
} else {
    // Guest user, fetch from session
    $sessionCart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

    if (!empty($sessionCart)) {
        $productIds = array_keys($sessionCart);
        if (!empty($productIds)) {
            $productIdsList = implode(',', array_map('intval', $productIds));
            $query = "SELECT id, name, price, image FROM products WHERE id IN ($productIdsList)";
            $result = $conn->query($query);

            while ($product = $result->fetch_assoc()) {
                $product['quantity'] = $sessionCart[$product['id']];
                $cartItems[] = $product;
            }
        }
    }
}

header('Content-Type: application/json');
echo json_encode($cartItems);
exit;

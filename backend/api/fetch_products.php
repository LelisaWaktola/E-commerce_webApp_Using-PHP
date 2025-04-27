<?php
header('Content-Type: application/json');
include '../db/connection.php'; // connect to your database

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);

$products = [];

while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

echo json_encode($products);
?>

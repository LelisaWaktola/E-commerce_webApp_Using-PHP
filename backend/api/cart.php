<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<h2>Your Cart</h2>
<?php if (empty($cart)): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
    <table>
        <tr>
            <th>Image</th><th>Name</th><th>Price</th><th>Quantity</th><th>Total</th>
        </tr>
        <?php
        $grand_total = 0;
        foreach ($cart as $item):
            $total = $item['price'] * $item['quantity'];
            $grand_total += $total;
        ?>
        <tr>
            <td><img src="assets/<?php echo $item['image']; ?>" width="50"></td>
            <td><?php echo $item['name']; ?></td>
            <td>$<?php echo $item['price']; ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td>$<?php echo number_format($total, 2); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <h3>Grand Total: $<?php echo number_format($grand_total, 2); ?></h3>
<?php endif; ?>

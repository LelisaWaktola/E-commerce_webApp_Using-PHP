<?php
session_start();
?>


<!-- /htdocs/your_project_name/frontend/index.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My eCommerce Website</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Header -->
    <header>
        <h1>MyShop</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="cart.php">Cart (<span id="cart-count">0</span>)</a>
            
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="../backend/api/logout.php" style="color: red; text-decoration: none; font-weight: bold;">Logout (<?php echo $_SESSION['username']; ?>)</a>
        <?php else: ?>
            <a href="login.html" >Login</a>
        <?php endif; ?>
        </nav>
    </header>

    <!-- Main -->
    <main>
        <h2>Products</h2>
        <div id="product-list" class="product-grid">
            <!-- Products will be loaded here by JS -->
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 MyShop. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
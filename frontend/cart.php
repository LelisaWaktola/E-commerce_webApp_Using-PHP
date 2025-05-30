
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cart - MyShop</title>
  <link rel="stylesheet" href="css/style.css">
    <style>
        /* Your cart CSS here */
        #cart-table {
    width: 100%;
    border-collapse: collapse; /* Very important for neat tables */
}

#cart-table th {
    background-color: #f4f4f4;
    padding: 12px;
    font-size: 18px;
    border-bottom: 2px solid #ccc;
    text-align: left; /* make header text left aligned */
}

.cart-row td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    /* Remove width:100% here */
}

.cart-name {
    padding-left: 40px;
    color: green;
}

.cart-image {
    border-radius: 8px;
    width: 50px;
    height: auto;
    margin-left: 0;     
}

.cart-price, .cart-total {
    color: #4CAF50;
    font-weight: bold;
}

    </style>
</head>
<body>

  <header>
    <h1>MyShop</h1>
    <nav>
      <a href="index.php">Home</a>
    </nav>
  </header>

  <main>
    <h2>Your Cart</h2>

    <div class="cart-container">
      <table class="cart-table">
        <thead>
          <tr>
            <th>Product</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
          </tr>
        </thead>
        <table id="cart-items">
  

        </table>
      </table>

      <div class="cart-total">
        <h3>Total: $<span id="cart-total">0.00</span></h3>
        <button class="checkout-btn">Proceed to Checkout</button>
      </div>
    </div>

    <p id="empty-cart-message" class="empty-cart">Your cart is currently empty.</p>

  </main>

  <footer>
    <p>&copy; 2025 MyShop. All rights reserved.</p>
  </footer>
  <script src="js/cart.js"></script>
</body>
</html>

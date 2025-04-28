
document.addEventListener('DOMContentLoaded', ()=>{
    fetch('../backend/api/get_cart_items.php')
        .then(response => response.json())
        .then(cartItems => {
            const tbody = document.getElementById('cart-items');
            tbody.innerHTML = ''; // Clear any existing rows

            let grandTotal = 0;

            cartItems.forEach(item => {
                const total = item.price * item.quantity;
                grandTotal += total;

                const row = `
                                <tr class="cart-row">
                                <td><img src="asset/images/${item.image}" width="50" class="cart-image"></td>
                                <td class="cart-name">${item.name}</td>
                                <td class="cart-price">$${item.price}</td>
                                <td class="cart-quantity">${item.quantity}</td>
                                <td class="cart-total">$${total}</td>
                                </tr>
                                `;
            tbody.innerHTML += row;

            });

            // Optionally display grand total somewhere
            document.getElementById('cart-total').innerText = `Total: $${grandTotal}`;
        })
        .catch(error => {
            console.error('Error loading cart items:', error);
        });
});

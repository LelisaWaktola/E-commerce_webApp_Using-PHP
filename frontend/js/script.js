document.addEventListener('DOMContentLoaded', () => {
    fetch('../backend/api/fetch_products.php')
        .then(response => response.json())
        .then(products => {
            const productContainer = document.querySelector('.product-grid'); // container div
            products.forEach(product => {
                const productCard = document.createElement('div');
                productCard.classList.add('product-card');
                
                productCard.innerHTML = `
                    <img src="asset/images/${product.image}" alt="${product.name}" class="product-image">
                    <h3 class="product-title">${product.name}</h3>
                    <p class="product-price">$${product.price}</p>
                    <p class="product-description">${product.description || "No description available."}</p>
                    <form method="post" action="../backend/api/add_to_cart.php">
                        <input type="hidden" name="product_id" value="${product.id}">
                        <button type="submit" class="add-to-cart-btn" name="${product.id}">Add to Cart</button>
                    </form>
                `;
                
                productContainer.appendChild(productCard);
            });
        })
        .catch(error => console.error('Error fetching products:', error));
});

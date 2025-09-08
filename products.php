<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Electronics Shop</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      background: linear-gradient(to right, #ece9e6, #ffffff);
    }

    header {
      background-color: #2c3e50;
      color: white;
      padding: 20px 30px;
      font-size: 28px;
      font-weight: bold;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
    }

    .add-product-btn {
      background-color: #3498db;
      color: white;
      padding: 10px 18px;
      text-decoration: none;
      border-radius: 5px;
      font-size: 16px;
      transition: background 0.3s ease;
    }

    .add-product-btn:hover {
      background-color: #2980b9;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
    }

    .products {
      flex: 1;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
      gap: 20px;
      padding: 30px;
    }

    .product {
      background-color: white;
      border-radius: 8px;
      padding: 15px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: transform 0.2s;
    }

    .product:hover {
      transform: translateY(-5px);
    }

    .product img {
      width: 100%;
      height: 150px;
      object-fit: contain;
    }

    .product h3 {
      font-size: 18px;
      margin: 10px 0 5px;
    }

    .product p {
      font-weight: bold;
      color: #2c3e50;
    }

    .add-cart-btn {
      background: linear-gradient(135deg, #27ae60, #2ecc71);
      color: white;
      padding: 10px;
      border: none;
      width: 100%;
      cursor: pointer;
      border-radius: 5px;
      font-weight: bold;
      font-size: 15px;
      transition: all 0.2s ease;
    }

    .add-cart-btn:hover {
      transform: scale(1.03);
      background: linear-gradient(135deg, #2ecc71, #27ae60);
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .cart {
      width: 380px;
      background-color: #fdfdfd;
      border-left: 1px solid #ccc;
      padding: 25px;
      position: relative;
      box-shadow: -2px 0 10px rgba(0,0,0,0.1);
      min-height: 100vh;
    }

    .cart h2 {
      margin-top: 0;
      font-size: 24px;
      border-bottom: 2px solid #27ae60;
      padding-bottom: 10px;
      color: #2c3e50;
    }

    .cart-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 15px 0;
      padding-bottom: 10px;
      border-bottom: 1px solid #eee;
    }

    .cart-item span {
      font-size: 14px;
    }

    .quantity-controls {
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .quantity-controls button {
      padding: 2px 8px;
      font-size: 14px;
      cursor: pointer;
      background-color: #ddd;
      border: none;
      border-radius: 3px;
    }

    .remove-btn {
      color: red;
      cursor: pointer;
      font-size: 14px;
    }

    .total {
      margin-top: 20px;
      font-weight: bold;
      font-size: 18px;
      color: #27ae60;
    }

    .checkout-btn {
      background-color: #e67e22;
      border: none;
      padding: 10px 15px;
      color: white;
      font-weight: bold;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
      transition: 0.2s ease;
    }

    .checkout-btn:hover {
      background-color: #d35400;
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
      }
      .cart {
        width: 100%;
        min-height: auto;
        position: static;
        border-left: none;
        box-shadow: none;
      }
    }
  </style>
</head>
<body>

<header>
  🛍️ Electronics Items Dashboard
  <a href="product.html" class="add-product-btn">➕ Add Product</a>
</header>

<div class="container">
  <div class="products">
    <!-- Product Cards -->
    <div class="product" data-id="1">
      <img src="./images/phone1.png" alt="Smartphone">
      <h3>Smartphone</h3>
      <p>₹15,000</p>
      <button class="add-cart-btn" onclick="addToCart(1)">🛒 Add to Cart</button>
    </div>

    <div class="product" data-id="2">
      <img src="./images/laptop2.png" alt="Laptop">
      <h3>Laptop</h3>
      <p>₹45,000</p>
      <button class="add-cart-btn" onclick="addToCart(2)">🛒 Add to Cart</button>
    </div>

    <div class="product" data-id="3">
      <img src="./images/headphone.png" alt="Headphones">
      <h3>Headphones</h3>
      <p>₹2,000</p>
      <button class="add-cart-btn" onclick="addToCart(3)">🛒 Add to Cart</button>
    </div>

    <div class="product" data-id="4">
      <img src="./images/w1.png" alt="Smartwatch">
      <h3>Smartwatch</h3>
      <p>₹3,500</p>
      <button class="add-cart-btn" onclick="addToCart(4)">🛒 Add to Cart</button>
    </div>

    <div class="product" data-id="5">
      <img src="./images/tablet.png" alt="Tablet">
      <h3>Tablet</h3>
      <p>₹18,000</p>
      <button class="add-cart-btn" onclick="addToCart(5)">🛒 Add to Cart</button>
    </div>

    <div class="product" data-id="6">
      <img src="./images/camera.png" alt="Camera">
      <h3>Camera</h3>
      <p>₹25,000</p>
      <button class="add-cart-btn" onclick="addToCart(6)">🛒 Add to Cart</button>
    </div>

    <div class="product" data-id="7">
      <img src="./images/bluetoothspeaker.png" alt="Speaker">
      <h3>Bluetooth Speaker</h3>
      <p>₹3,000</p>
      <button class="add-cart-btn" onclick="addToCart(7)">🛒 Add to Cart</button>
    </div>

    <div class="product" data-id="8">
      <img src="./images/gaming.png" alt="Gaming Console">
      <h3>Gaming Console</h3>
      <p>₹40,000</p>
      <button class="add-cart-btn" onclick="addToCart(8)">🛒 Add to Cart</button>
    </div>
  </div>

  <div class="cart" id="cart">
    <h2>🛒 Your Cart</h2>
    <div id="cartItems"></div>
    <div class="total" id="cartTotal">Total: ₹0</div>
    <button class="checkout-btn" onclick="checkout()">✅ Checkout</button>
  </div>
</div>

<script>
  const cart = {};
  const products = {
    1: { name: "Smartphone", price: 15000 },
    2: { name: "Laptop", price: 45000 },
    3: { name: "Headphones", price: 2000 },
    4: { name: "Smartwatch", price: 3500 },
    5: { name: "Tablet", price: 18000 },
    6: { name: "Camera", price: 25000 },
    7: { name: "Bluetooth Speaker", price: 3000 },
    8: { name: "Gaming Console", price: 40000 }
  };

  function addToCart(id) {
    if (cart[id]) {
      cart[id].qty += 1;
    } else {
      cart[id] = {
        ...products[id],
        qty: 1
      };
    }
    renderCart();
  }

  function updateQty(id, change) {
    if (cart[id]) {
      cart[id].qty += change;
      if (cart[id].qty <= 0) {
        delete cart[id];
      }
      renderCart();
    }
  }

  function removeItem(id) {
    delete cart[id];
    renderCart();
  }

  function renderCart() {
    const cartItemsDiv = document.getElementById('cartItems');
    cartItemsDiv.innerHTML = '';
    let total = 0;

    for (let id in cart) {
      const item = cart[id];
      total += item.price * item.qty;

      const div = document.createElement('div');
      div.className = 'cart-item';
      div.innerHTML = `
        <span>${item.name}<br>₹${item.price} x ${item.qty}</span>
        <div class="quantity-controls">
          <button onclick="updateQty(${id}, -1)">-</button>
          <button onclick="updateQty(${id}, 1)">+</button>
        </div>
        <span class="remove-btn" onclick="removeItem(${id})">✖</span>
      `;
      cartItemsDiv.appendChild(div);
    }

    document.getElementById('cartTotal').textContent = `Total: ₹${total}`;
  }
function checkout() {
  const totalAmount = Object.values(cart).reduce((sum, item) => sum + item.price * item.qty, 0);
  if (totalAmount > 0) {
    fetch('save_order.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ cart, total: totalAmount })
    })
    .then(async response => {
      const text = await response.text();
      console.log('Raw response from server:', text);

      try {
        const data = JSON.parse(text);
        if (data.status === 'success') {
          alert("🎉 Order placed successfully!\nTotal Amount: ₹" + totalAmount);

          // Clear cart
          for (let id in cart) delete cart[id];
          renderCart();

          // ✅ Redirect to orders page
          window.location.href = 'orders.php';
        } else {
          alert("❌ Failed: " + data.message);
        }
      } catch (e) {
        console.error('❌ JSON parse error:', e.message);
        alert("⚠️ Invalid response from server.\nSee console for details.");
      }
    })
    .catch(err => {
      console.error('❌ Fetch error:', err.message);
      alert("❌ Server error occurred");
    });
  } else {
    alert("🛒 Your cart is empty!");
  }
}


</script>

</body>
</html>



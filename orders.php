<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>🛒 Orders Dashboard</title>

  <style>
    :root {
      --primary: #4f46e5;
      --primary-light: #818cf8;
      --accent: #f43f5e;
      --accent-light: #fb7185;
      --success: #22c55e;
      --pending: #facc15;
      --cancelled: #ef4444;
      --text-dark: #1e293b;
      --bg-light: #f9fafb;
      --white: #ffffff;
      --shadow-dark: rgba(0,0,0,0.1);
    }

    * { box-sizing: border-box; }
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 40px 20px;
      background: linear-gradient(135deg, #eef2ff, #fdf2f8);
      color: var(--text-dark);
      min-height: 100vh;
      overflow-x: hidden;
    }

    h1 {
      text-align: center;
      font-weight: 900;
      font-size: 3rem;
      color: var(--primary);
      margin-bottom: 40px;
      letter-spacing: 3px;
      text-shadow: 2px 2px 5px rgba(79, 70, 229, 0.3);
      animation: fadeInDown 1s ease forwards;
      opacity: 0;
    }

    .table-wrapper {
      max-width: 1150px;
      margin: 0 auto;
      background: var(--white);
      border-radius: 20px;
      box-shadow: 0 10px 30px var(--shadow-dark), 0 4px 15px var(--shadow-dark);
      overflow-x: auto;
      animation: fadeInUp 1s ease 0.5s forwards;
      opacity: 0;
      border: 3px solid transparent;
      background-image: linear-gradient(var(--white), var(--white)),
        radial-gradient(circle at top left, var(--primary-light), var(--accent-light));
      background-origin: border-box;
      background-clip: padding-box, border-box;
    }

    .table-wrapper:hover {
      border-color: var(--primary-light);
      box-shadow: 0 12px 40px rgba(79, 70, 229, 0.3), 0 6px 25px rgba(244, 63, 94, 0.3);
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      min-width: 700px;
      font-weight: 600;
    }

    thead tr {
      background: linear-gradient(90deg, var(--primary), var(--accent));
      color: white;
      font-size: 1.1rem;
      letter-spacing: 0.06em;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 18px 22px;
      text-align: left;
      vertical-align: middle;
      white-space: nowrap;
    }

    tbody tr {
      background: #fafafa;
      border-bottom: 1px solid #e2e8f0;
      transition: background-color 0.3s ease, transform 0.25s ease;
      opacity: 0;
      transform: translateY(25px);
      animation: fadeInUp 0.7s forwards;
    }

    tbody tr:hover {
      background: #e0e7ff;
      box-shadow: 0 8px 30px rgba(79, 70, 229, 0.25),
                  0 4px 15px rgba(244, 63, 94, 0.2);
      transform: translateY(-7px) scale(1.03);
      z-index: 2;
    }

    /* Buttons */
    .btn-edit, .btn-delete, .btn-pay {
      border: none;
      padding: 6px 12px;
      margin-right: 6px;
      border-radius: 6px;
      font-weight: 600;
      font-size: 0.85rem;
      cursor: pointer;
      transition: all 0.3s ease;
      white-space: nowrap;
    }

    .btn-edit {
      background-color: var(--primary);
      color: white;
    }

    .btn-edit:hover {
      background-color: #4338ca;
    }

    .btn-delete {
      background-color: var(--cancelled);
      color: white;
    }

    .btn-delete:hover {
      background-color: #b91c1c;
    }

    .btn-pay {
      background-color: var(--success);
      color: white;
    }

    .btn-pay:hover {
      background-color: #16a34a;
    }

    @media (max-width: 900px) {
      body { padding: 30px 12px; }
      .table-wrapper { max-width: 100%; }
      table { min-width: 600px; }
      h1 { font-size: 2.4rem; }
    }

    @media (max-width: 550px) {
      table { min-width: 500px; }
      h1 { font-size: 2rem; }
      th, td { padding: 12px 10px; font-size: 0.9rem; }
      .btn-edit, .btn-delete, .btn-pay { font-size: 0.8rem; padding: 5px 8px; }
    }

    @keyframes fadeInDown {
      0% { opacity: 0; transform: translateY(-40px);}
      100% { opacity: 1; transform: translateY(0);}
    }

    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(25px);}
      100% { opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>

  <h1>🛒 Recent Orders</h1>

  <div class="table-wrapper">
    <?php
      $query = "SELECT * FROM orders_new ORDER BY order_time DESC LIMIT 20";
      $result = $conn->query($query);

      if ($result->num_rows > 0) {
        echo "<table>";
        echo "<thead>
                <tr>
                  <th>ID</th>
                  <th>Product</th>
                  <th>Price (₹)</th>
                  <th>Qty</th>
                  <th>Total (₹)</th>
                  <th>Order Time</th>
                  <th>Actions</th>
                </tr>
              </thead>";
        echo "<tbody>";
        $delayCount = 1;
        while ($row = $result->fetch_assoc()) {
          echo "<tr style='animation-delay: " . (0.5 + $delayCount * 0.2) . "s'>";
          echo "<td>" . htmlspecialchars($row['id']) . "</td>";
          echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
          echo "<td>" . number_format($row['price'], 2) . "</td>";
          echo "<td>" . intval($row['quantity']) . "</td>";
          echo "<td>" . number_format($row['total_amount'], 2) . "</td>";
          echo "<td>" . htmlspecialchars($row['order_time']) . "</td>";
          echo "<td>
                  <button class='btn-edit' onclick='editOrder(" . $row['id'] . ")'>📝 Edit</button>
                  <button class='btn-delete' onclick='deleteOrder(" . $row['id'] . ")'>❌ Delete</button>
                  <button class='btn-pay' onclick='payNow(" . $row['total_amount'] . ", " . $row['id'] . ")'>💰 Pay Now</button>
                </td>";
          echo "</tr>";
          $delayCount++;
        }
        echo "</tbody></table>";
      } else {
        echo "<p style='text-align:center; padding: 40px; font-size:1.3rem; color:#777;'>No orders to display.</p>";
      }
    ?>
  </div>

  <script>
    function editOrder(id) {
      window.location.href = 'edit.php?id=' + id;
    }

    function deleteOrder(id) {
      if (confirm("Are you sure you want to delete order ID " + id + "?")) {
        window.location.href = 'delete_order.php?id=' + id;
      }
    }
  </script>

  <!-- Razorpay Checkout JS -->
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

  <script>
    function payNow(amount, orderId) {
      var options = {
        "key": "rzp_test_XXXXXXXXXXXXXXXXXX", // Apni Razorpay Test Key yahan dalein
        "amount": amount * 100, // Paise me amount
        "currency": "INR",
        "name": "Demo Store",
        "description": "Test Payment for Order #" + orderId,
        "handler": function (response) {
          alert("Payment Successful! Payment ID: " + response.razorpay_payment_id);
          // Yahan backend call karke payment confirmation save kar sakte ho
        },
        "prefill": {
          "name": "Test User",
          "email": "test@example.com",
          "contact": "9999999999"
        },
        "theme": {
          "color": "#4f46e5"
        }
      };
      var rzp1 = new Razorpay(options);
      rzp1.open();
    }
  </script>

</body>
</html>

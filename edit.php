<?php
include('db.php');

if (!isset($_GET['id'])) {
  die("Order ID is missing.");
}

$id = intval($_GET['id']);

// Handle update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $product_name = $_POST['product_name'];
  $price = floatval($_POST['price']);
  $quantity = intval($_POST['quantity']);
  $total = $price * $quantity;

  $stmt = $conn->prepare("UPDATE orders_new SET product_name=?, price=?, quantity=?, total_amount=? WHERE id=?");
  $stmt->bind_param("sdddi", $product_name, $price, $quantity, $total, $id);

  if ($stmt->execute()) {
    echo "<script>alert('Order updated successfully!'); window.location.href='orders.php';</script>";
    exit;
  } else {
    echo "<p style='color:red;'>Failed to update order.</p>";
  }
}

// Fetch existing order
$stmt = $conn->prepare("SELECT * FROM orders_new WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();

if (!$order) {
  die("Order not found.");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Order</title>
  <style>
    body { font-family: sans-serif; padding: 40px; background: #f0f4f8; }
    .container {
      background: white;
      padding: 30px;
      max-width: 500px;
      margin: auto;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    h2 { margin-bottom: 20px; color: #4f46e5; }
    label { display: block; margin-bottom: 6px; font-weight: bold; }
    input[type="text"], input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      padding: 10px 15px;
      background-color: #4f46e5;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #4338ca;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Edit Order #<?= htmlspecialchars($order['id']) ?></h2>
  <form method="post">
    <label>Product Name</label>
    <input type="text" name="product_name" value="<?= htmlspecialchars($order['product_name']) ?>" required>

    <label>Price (₹)</label>
    <input type="number" name="price" value="<?= htmlspecialchars($order['price']) ?>" step="0.01" required>

    <label>Quantity</label>
    <input type="number" name="quantity" value="<?= htmlspecialchars($order['quantity']) ?>" required>

    <button type="submit">Update Order</button>
  </form>
</div>

</body>
</html>


<?php
include('db.php');  // apne database connection file

// Razorpay se GET params lena
if (isset($_GET['order_id']) && isset($_GET['payment_id'])) {
    $order_id = intval($_GET['order_id']);
    $payment_id = $_GET['payment_id'];

    // Database mein payment status update karna
    $stmt = $conn->prepare("UPDATE orders_new SET payment_status = 'Paid', payment_id = ? WHERE id = ?");
    $stmt->bind_param("si", $payment_id, $order_id);

    if ($stmt->execute()) {
        echo "<h2>Payment Successful! 🎉</h2>";
        echo "<p>Order ID: " . htmlspecialchars($order_id) . "</p>";
        echo "<p>Payment ID: " . htmlspecialchars($payment_id) . "</p>";
        echo "<p>Thank you for your purchase.</p>";
        echo '<a href="orders.php">Back to Orders</a>';
    } else {
        echo "<h2>Error updating payment status. Please contact support.</h2>";
    }
    $stmt->close();
} else {
    echo "<h2>Invalid access.</h2>";
}
$conn->close();
?>

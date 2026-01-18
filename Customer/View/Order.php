<?php
include '../Controller Logic/OrderController.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <link rel="stylesheet" href="../Stylesheet/CustomerDashboard.css">
</head>
<body>

<h2>Ongoing Orders</h2>

<?php
if (mysqli_num_rows($ongoing_orders) > 0) {
    while ($order = mysqli_fetch_assoc($ongoing_orders)) {
?>
        <div class="order-card">
            <strong>Order #<?php echo $order['order_id']; ?></strong><br>
            Total: Tk <?php echo $order['total_amount']; ?><br>
            Status: <?php echo $order['order_status']; ?><br>
            Date: <?php echo $order['order_time']; ?><br>

            <a href="OrderDetails.php?order_id=<?php echo $order['order_id']; ?>">
                View Details
            </a>
        </div>
<?php
    }
} else {
    echo "<p>No ongoing orders</p>";
}
?>

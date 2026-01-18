<?php include '../Controller Logic/OrderDetailsController.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>

<div class="order-details-container">

<h2>Order #<?php echo $order['order_id']; ?></h2>

<div class="order-meta">
 <span class="status <?php echo strtolower($order['order_status']); ?>">
         <?php echo ucfirst($order['order_status']); ?>
</span>
<span class="date">
         <?php echo $order['order_time']; ?></p>
</span>
</div>

<hr>

<h3>Items</h3>

<?php
$total = 0;

while ($item = mysqli_fetch_assoc($items)) {
    $subtotal = $item['price'] * $item['quantity'];
    $total += $subtotal;
    ?>
    <p>
        <?php echo $item['name']; ?> × <?php echo $item['quantity']; ?>
        — Tk <?php echo $subtotal; ?>
    </p>
<?php } ?>
<hr>
<strong>Total: Tk <?php echo $total; ?></strong>

<br><br>
<a href="Order.php">← Back to Orders</a>

<?php if ($order['order_status'] == 'pending') { ?>
    <form method="post"
          action="../Controller Logic/OrderController.php"
          onsubmit="return confirm('Are you sure you want to cancel this order?');">

        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">

        <button type="submit" name="cancel_order">
            Cancel Order
        </button>
    </form>
<?php } ?>



</body>
</html>

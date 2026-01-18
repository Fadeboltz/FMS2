<?php include '../Controller Logic/OrderDetailsController.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>

<h2>Order #<?php echo $order['order_id']; ?></h2>
<p>Status: <?php echo $order['order_status']; ?></p>
<p>Date: <?php echo $order['order_time']; ?></p>

<hr>

<h3>Items</h3>


</body>
</html>

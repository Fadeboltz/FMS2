<?php include '../Controller/CustomerDashboardController.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Raphael's World</title>
    <link rel="stylesheet" href="../Stylesheet/CustomerDashboard.css">
</head>

<body>

<div class="navbar">
    <h2>Food Panda Clone</h2>
    <div class="nav-links">
        <span>Hi, <?php echo htmlspecialchars($user_email); ?></span>
        <a href="#">My Cart (0)</a>
        <a href="#">My Orders</a>
        <a href="Login.php">Logout</a>
    </div>
</div>
</body>
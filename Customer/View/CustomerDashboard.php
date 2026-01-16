<?php include '../Controller Logic/CustomerDashboardController.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Raphael's World</title>
    <link rel="stylesheet" href="../Stylesheet/CustomerDashboard.css">
</head>

<body>

<div class="navbar">
    <h2>Raphael's World</h2>
    <div class="nav-links">
        <span>Hi, <?php echo htmlspecialchars($user_email); ?></span>
        <a href="#">My Cart (0)</a>
        <a href="#">My Orders</a>
        <a href="Login.php">Logout</a>
    </div>
</div>

<div class="filters">
    <a href="CustomerDashboard.php?category=All" class="filter-btn">All</a>
    <a href="CustomerDashboard.php?category=Burger" class="filter-btn">🍔 Burger</a>
    <a href="CustomerDashboard.php?category=Pizza" class="filter-btn">🍕 Pizza</a>
    <a href="CustomerDashboard.php?category=Pancake" class="filter-btn">🥞 Pancake</a>
    <a href="CustomerDashboard.php?category=Shawarma" class="filter-btn">🌯 Shawarma</a>
    <a href="CustomerDashboard.php?category=Taco" class="filter-btn">🌮 Taco</a>
    <a href="CustomerDashboard.php?category=Poutine" class="filter-btn">🍛 Poutine</a>
    <a href="CustomerDashboard.php?category=Ramen" class="filter-btn">🍜 Ramen</a>
    <a href="CustomerDashboard.php?category=Sushi" class="filter-btn">🍣 Sushi</a>
    <a href="CustomerDashboard.php?category=Cake" class="filter-btn">🍰 Cake</a>
</div>

<div class="menu-container">

<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <div class="food-card">
            <div class="food-img-box">
                <img src="../Images/<?php echo $row['image']; ?>" alt="Food">
        </div>

        <div class="food-info">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <div class="category-tag"><?php echo $row['category']; ?></div>
                <div class="price">Tk <?php echo $row['price']; ?></div>
                <button class="add-btn"
                        onclick="addToCart('<?php echo $row['name']; ?>')">
                    Add to Cart
                </button>
            </div>
        </div>
<?php
    }
} else {
    echo "<h3>No items found</h3>";
}
?>
</div>
<script src="CustomerDashboard.js"></script>
</body>
</html>
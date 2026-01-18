<?php
session_start();
include '../Model/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit();
}

$user_id = (int)$_SESSION['user_id'];

// Handle checkout
if (isset($_POST['checkout'])) {

    if (empty($_SESSION['cart'])) {
        header("Location: ../View/CustomerDashboard.php");
        exit();
    }
    $total = 0;

    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['qty'];
    }

    //Create order 
    mysqli_query(
        $conn,
        "INSERT INTO orders (user_id, total_amount, order_status)
         VALUES ($user_id, $total, 'pending')"
    );

    $order_id = mysqli_insert_id($conn);

    // Insert order items 
    foreach ($_SESSION['cart'] as $item) {
        $menu_id = $item['menu_id'];
        $price   = $item['price'];
        $qty     = $item['qty'];

        mysqli_query(
            $conn,
            "INSERT INTO order_items (order_id, menu_id, price, quantity)
             VALUES ($order_id, $menu_id, $price, $qty)"
        );
    }

    // Clear cart 
    $_SESSION['cart'] = [];

    $_SESSION['order_success'] = "Order placed successfully!";

    header("Location: ../View/Order.php");
    exit();
}



?>

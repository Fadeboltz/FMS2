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
?>

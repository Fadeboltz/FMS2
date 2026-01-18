<?php
session_start();
include '../Model/db.php';

//login protection
if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit();
}

//validate order_id
if (!isset($_GET['order_id'])) {
    header("Location: Order.php");
    exit();
}


?>
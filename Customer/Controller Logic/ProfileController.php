<?php
session_start();
include '../Model/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: Login.php");
    exit();
}

$user_id = (int)$_SESSION['user_id'];
$success = $error = "";

$result = mysqli_query($conn, "SELECT * FROM user WHERE user_id = $user_id");
$user = mysqli_fetch_assoc($result);
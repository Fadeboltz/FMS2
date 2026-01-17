<?php

session_start();

include '../Controller Logic/CartController.php';
include '../Model/CustomerDashboard_db.php';

if(!isset($_SESSION['user_id'])) 
{
    header("Location: Login.php");
    exit();
}

$user_email = $_SESSION['Email'];

$sql = "SELECT * FROM menu";

if(isset($_GET['category']))
{
    $cat = mysqli_real_escape_string($conn, $_GET['category']);
    if ($cat != 'All') {
        $sql = "SELECT * FROM menu WHERE category = '$cat'";
    }
}

$result = mysqli_query($conn, $sql);

//add to card

if (isset($_POST['add_to_cart'])) {

    $menu_id = (int)$_POST['menu_id'];

    $query = "SELECT menu_id, name, price, image FROM menu WHERE menu_id = $menu_id";
    $res = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($res)) {
        if (isset($_SESSION['cart'][$menu_id])) {
            $_SESSION['cart'][$menu_id]['qty'] += 1;
        } else {
            $_SESSION['cart'][$menu_id] = [
                'menu_id' => $menu_id,
                'name'    => $row['name'],
                'price'   => $row['price'],
                'image'   => $row['image'],
                'qty'     => 1
            ];
        }
    }

    header("Location: CustomerDashboard.php");
    exit();
}

if (isset($_POST['cart_action'])) {

    $menu_id = (int)$_POST['menu_id'];

    if ($_POST['cart_action'] === 'increase') {
        $_SESSION['cart'][$menu_id]['qty']++;
    }

    if ($_POST['cart_action'] === 'decrease') {
        $_SESSION['cart'][$menu_id]['qty']--;

        if ($_SESSION['cart'][$menu_id]['qty'] <= 0) {
            unset($_SESSION['cart'][$menu_id]);
        }
    }

    if ($_POST['cart_action'] === 'remove') {
        unset($_SESSION['cart'][$menu_id]);
    }

    header("Location: CustomerDashboard.php");
    exit();
}




?>
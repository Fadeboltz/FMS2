<?php

session_start();

include '../Model/login_DB.php';

if(!isset($_SESSION['user_id'])) 
{
    header("Location: Login.php");
    exit();
}

$user_email = $_SESSION['Email'];

$sql = "SELECT * FROM menu";

if(isset($_GET['catergory']))
{
    $cat = mysqli_real_escape_string($conn, $_GET['category']);
    if ($cat != 'All') {
        $sql = "SELECT * FROM menu WHERE category = '$cat'";
    }
}

$result = mysqli_query($conn, $sql);

?>
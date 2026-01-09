<?php
include '../Model/user.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $contactno = $_POST['contactno'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmpassword']; 
    $accountType = $_POST['accounttype'];

}
?>
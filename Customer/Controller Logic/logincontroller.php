<?php
include '../Model/login_DB.php';

$email = $password = "";
$emailErr = $passErr = "";
$loginSuccess = false;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data); 
    $data = htmlspecialchars($data); 
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passErr = "Password is required";
    } 

    if (empty($emailErr) && empty($passErr)) {
        $loginSuccess = true;
    }
}
?>
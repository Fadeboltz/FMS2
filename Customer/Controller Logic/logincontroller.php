<?php

include '../Model/db_conn.php';

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
    
    // Validate email
    if (empty($_POST["email"])) 
    {
        $emailErr = "Email is required";
    } 
    else 
    {
        $email = trim($_POST["email"]);
    }
    // Validate password
    if (empty($_POST["password"])) 
    {
        $passErr = "Password is required";
    } 
    else 
    {
        $password = trim($_POST["password"]);
    }
    // Check database
    if (empty($emailErr) && empty($passErr))
    {
        $safe_email = mysqli_real_escape_string($conn, $email);
        $safe_password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM users WHERE email='$safe_email' AND password='$safe_password'";
        $result = $conn->query($sql);
        if ($result->num_rows == 1) 
        {
        $loginSuccess = true;
    }
}
?>
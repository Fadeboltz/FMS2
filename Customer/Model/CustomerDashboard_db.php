<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fms";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM menu WHERE availability = 1";
$result = mysqli_query($conn, $sql);
?>
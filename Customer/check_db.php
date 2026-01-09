<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fms";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

echo "<h1>Database Connection: SUCCESS</h1>";
echo "<h2>Table: users</h2>";

$sql = "SHOW COLUMNS FROM user";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
    echo "<br><strong>POSSIBLE CAUSE:</strong> The table 'users' might not exist.";
} else {
    echo "<table border='1'><tr><th>Column Name</th><th>Type</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Field'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
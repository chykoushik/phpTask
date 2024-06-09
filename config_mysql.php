<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "db_task";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conn failed: " . $conn->connect_error);
}
?>




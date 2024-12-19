<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ovs";

$conn = new mysqli($servername, $username, $password, $dbname,3301);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

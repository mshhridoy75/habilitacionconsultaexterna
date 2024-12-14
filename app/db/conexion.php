<?php
$servername = "localhost"; // or your server's IP
$username = "root";
$password = "";
$dbname = "expertocalidad";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
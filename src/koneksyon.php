<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "realmadrid";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Cek Connection " . $conn->connect_error);
}
?>
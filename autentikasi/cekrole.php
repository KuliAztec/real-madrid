<?php
session_start();

$servername = "localhost";
$username = "ifunsoed_realmadrid";
$password = "";
$dbname = "ifunsoed_realmadrid";
  
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
  
// Check connection
if ($conn->connect_error) {
    die("Cek Connection " .$conn->connect_error);
}

if (!isset($_SESSION['id_user'])) {
    echo'<script>alert("Anda harus login terlebih dahulu");window.location.href="login.php";</script>';
    exit();
}

$user_id = $_SESSION['id_user'];

$query = "SELECT role FROM user WHERE id_user = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header("Location: login.php");
    exit();
}

$row = $result->fetch_assoc();
$user_role = $row['role'];

if ($user_role == 'manager') {
    echo'<script>alert("manager");window.location.href="home.php";</script>';
    exit();
} elseif ($user_role == 'user') {
    echo'<script>alert("emagan ada user yah");window.location.href="home.php";</script>';
    exit();
} else {
    echo'<script>alert("Anda tidak memiliki akses ke halaman ini");window.location.href="home.php";</script>';
    exit();
}

// buat debugging role user
?>

<?php
$servername = "localhost";
$username = "ifunsoed_realmadrid";
$password = "";
$dbname = "ifunsoed_realmadrid";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT COUNT(*) as count FROM sejarah WHERE id_sejarah = $id AND isi IS NOT NULL AND isi != ''";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

echo json_encode(['hasContent' => $row['count'] > 0]);

$conn->close();
?>
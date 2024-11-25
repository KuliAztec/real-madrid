<?php
session_start();
include '../koneksyon.php';

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ../login.php');
    exit;
}

if (isset($_GET['id_pemain'])) {
    $playerId = intval($_GET['id_pemain']);
    $sql = "SELECT * FROM pemain WHERE id_pemain = $playerId"; // Updated column name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $player = $result->fetch_assoc();
    } else {
        echo "Player not found.";
        exit;
    }
} else {
    echo "No player ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($player['nama_pemain']); ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1><?php echo htmlspecialchars($player['nama_pemain']); ?></h1>
        <img src="<?php echo htmlspecialchars($player['image_url']); ?>" alt="<?php echo htmlspecialchars($player['nama_pemain']); ?>" class="player-image">
        <p>Jersey Number: <?php echo htmlspecialchars($player['jersey_number']); ?></p>
        <p>Position: <?php echo htmlspecialchars($player['position']); ?></p>
        <!-- Add more player  -->
        <a href="../players/squad.php">Back</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
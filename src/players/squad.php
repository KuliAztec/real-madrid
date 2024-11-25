<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../login/login.php");
    exit;
}

include '../koneksyon.php';

$sql = "SELECT * FROM pemain ORDER BY nama_pemain";
$result = $conn->query($sql); // Changed con to $conn

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Players</title>
    <link rel="stylesheet" href="styles.css">
    <style> </style>
</head>
<body>
    <div class="container">
        <h1>Our Team Players</h1>
        <a href="../login/logout.php">Logout</a>
        <div class="players-grid">
            <?php
            if ($result->num_rows > 0) {
                $positions = [];
                while($player = $result->fetch_assoc()) {
                    $positions[$player['position']][] = $player;
                }

                foreach ($positions as $position => $players) {
                    usort($players, function($a, $b) {
                        return $a['jersey_number'] <=> $b['jersey_number'];
                    });

                    echo "<h2>" . htmlspecialchars($position) . "</h2><br>";
                    foreach ($players as $player) {
                        $playerId = htmlspecialchars($player['id_pemain'] ?? ''); // correct column name
                        echo "<a href='../biodata/bio_stats.php?id_pemain=" . $playerId . "'>"; // Updated parameter name
                        echo "<div class='player-card'>";
                        echo "<img src='" . htmlspecialchars($player['image_url'] ?? '') . "' 
                                  class='player-image'>";
                        echo "<div class='player-info'>";
                        echo "<div class='player-number'>#" . htmlspecialchars($player['jersey_number'] ?? '') . "</div>";
                        echo "<div class='player-name'>" . htmlspecialchars($player['nama_pemain'] ?? '') . "</div>";
                        echo "</div></div></a>";
                    }
                    echo "<br><br>"; // break between each position 
                }
            } else {
                echo "<p style='text-align: center; grid-column: 1/-1;'>No players found.</p>";
            }
            ?>
        </div>
    </div>

    <script>
        // Add hover effect for player cards
        document.querySelectorAll('.player-card').forEach(card => {
            card.addEventListener('mouseover', () => {
                card.style.transform = 'translateY(-5px)';
            });
            
            card.addEventListener('mouseout', () => {
                card.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>

<?php
$conn->close(); // Close the connection
?>
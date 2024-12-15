<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "realmadrid";
    
    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $idnow = isset($_GET['id']) ? intval($_GET['id']) : 1; // Mengambil id dari parameter URL atau default ke 1

    $sql = "SELECT * FROM sejarah WHERE id_sejarah = $idnow";
    $result = $conn->query($sql);
    $currentSejarah = $result->fetch_assoc();

    // Assuming user ID is stored in session
    $userId = isset($_SESSION['id_user']) ? intval($_SESSION['id_user']) : 0;
    $userRole = '';

    if ($userId > 0) {
        $sql = "SELECT role FROM user WHERE id_user = $userId";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $userRole = $result->fetch_assoc()['role'];
        } else {
            error_log("User role not found for user ID: " . $userId);
        }
    } else {
        error_log("User ID not set in session.");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <style>
        body, html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .container {
            position: relative;
            width: 100%;
            height: 100vh;
            background: url('../asset/background-history.png') no-repeat center center/cover;
            display: flex;
            flex-direction: column;
            color: white;
        }

        header {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            align-items: center;
        }

        .title {
            font-size: 44px;
            font-weight: bold;
            margin: 0;
        }

        .home-icon {
            width: 100px;
            height: 100px;
            cursor: pointer;
        }

        .crud-button {
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-left: 10px;
            align-self: center;
            width: 35px;
            height: 40px;
            top: 10px;
        }

        main {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
        }

        .content {
            background: transparent;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            border: 3px solid rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(1000px);
            color: black;
            margin-right: 500px; 
            font-size: 18px;          
        }

        .year {
            position: absolute;
            right: 160px;
            top: 62%;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.9);
        }

        footer {
            display: flex;
            justify-content: center;
            padding: 20px;
            gap: 20px;
        }

        .nav-button {
            background-color: white;
            color: black;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 30px;
            border-radius: 50px;
            border: 1px;
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-button:hover {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <header>
            <h1 class="title">HISTORY</h1>
            <div style="display: flex; align-items: center;">
                <a href="../index.php">
                    <img src="../asset/icon-white-home.png" alt="Home Icon" class="home-icon">
                </a>
                <?php if ($userRole == 'manager'): ?>
                    <a href="crud.php">
                        <img src="../asset/pen.png" alt="Add" class="crud-button">
                    </a>
                </a>
                <?php endif; ?>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            <div class="content">
                <p>
                    <?= $currentSejarah ? nl2br(htmlspecialchars($currentSejarah['isi'])) : 'Sejarah akan tercipta'; ?>
                </p>
            </div>
        </main>

        <!-- Year -->
        <div class="year">
            <?= $currentSejarah ? htmlspecialchars($currentSejarah['tahun']) : ''; ?>
        </div>

        <!-- Footer -->
        <footer>
            <button class="nav-button prev-button"><</button>
            <button class="nav-button next-button">></button>
        </footer>
    </div>

    <script>
        // Navigasi tombol prev dan next
        document.querySelector('.prev-button').addEventListener('click', () => {
            if (<?= $idnow ?> > 1) {
                window.location.href = 'history-1920.php?id=<?= $idnow - 1; ?>';
            } else {
                window.location.href = 'history.php';
            }
        });

        document.querySelector('.next-button').addEventListener('click', () => {
            fetch('check_content.php?id=<?= $idnow + 1; ?>')
                .then(response => response.json())
                .then(data => {
                    if (data.hasContent) {
                        window.location.href = 'history-1920.php?id=<?= $idnow + 1; ?>';
                    }
                });
        });
    </script>
</body>
</html>
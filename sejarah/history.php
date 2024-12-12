<?php
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

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Splash Screen Example</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <style>
        /* Global Styles */
        body, html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        /* Splash Screen */
        #splash-screen {
            background-image: url("../asset/history-splash.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        /* Main Content */
        #main-content {
            display: none;
        }

        .container {
            position: relative;
            width: 100%;
            height: 100vh;
            background: url('../asset/champion.png') no-repeat center center/cover;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        header {
            display: flex;
            justify-content: space-between;
            padding: 20px;
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

        main {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0 20px;
            text-align: center;
        }

        .content {
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            background: transparent;
            border: 3px solid rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
        }

        .content h2 {
            margin-top: 0;
            font-size: 22px;
        }

        footer {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .next-button {
            background-color: white;
            color: black;
            text-decoration: none;
            padding: 10px 20px;
            font-size: 30px;
            border-radius: 50px;
            transition: background-color 0.3s, color 0.3s;
        }

        .next-button:hover {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Splash Screen -->
    <div id="splash-screen">
        <!-- Optional: Add text or logo here -->
    </div>

    <!-- Main Content -->
    <div id="main-content">
        <div class="container">
            <header>
                <h1 class="title">HISTORY</h1>
                <a href="../index.php">
                    <img src="../asset/icon-white-home.png" alt="Home Icon" class="home-icon">
                </a>
            </header>
            <main>
                <div class="content">
                    <h2>Real Madrid Club de Fútbol</h2>
                    <p>
                        Real Madrid Club de Fútbol (pengucapan bahasa Spanyol: [reˈal maˈðɾið ˈkluβ ðe ˈfuðβol]; Royal Madrid Football Club), umumnya dikenal sebagai Real Madrid, adalah klub sepak bola profesional yang berbasis di Madrid, Spanyol. Didirikan pada tahun 1902 sebagai Madrid Football Club, secara tradisional mengenakan kostum kandang putih. Kata Real (“dari kerajaan”) Spanyol dan dianugerahkan ke klub oleh Raja Alfonso XIII pada tahun 1920 bersama-sama dengan mahkota kerajaan di lambang klub. Klub ini telah memainkan pertandingan kandang di Stadion Santiago Bernabéu dengan kapasitas 85.454 di pusat kota Madrid sejak tahun 1947.
                    </p>
                </div>
            </main>
            <footer>
                <a href="history-1920.php" class="next-button">></a>
            </footer>
        </div>
    </div>

    <script>
        // Display splash screen for 2 seconds
        document.addEventListener("DOMContentLoaded", function () {
            const splashScreen = document.getElementById("splash-screen");
            const mainContent = document.getElementById("main-content");

            setTimeout(() => {
                splashScreen.style.display = "none";
                mainContent.style.display = "block";
            }, 2000); // 2000ms = 2 seconds
        });
    </script>
</body>
</html>

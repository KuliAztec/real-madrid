<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Position Selector</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            width: 100%;
            background: url(../asset/background-hitamputih.jpg);
            background-size: cover;
            background-position: center;
            transition: opacity 0.3s ease-in-out;
        }

        .container {
            position: relative;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .home-icon {
            position: absolute;
            top: -10px;
            right: 60px;
            display: block;
            width: 100px;
            height: 100px;
        }

        .home-icon img {
            width: 100%;
            height: 100%;
        }

        .positions {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .position-button {
            display: inline-block;
            margin: 20px;
            transition: transform 0.3s ease;
        }

        .position-button:hover {
            transform: scale(1.1);
        }

        .position-image {
            width: 400px; 
            height: 75px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .position-image:hover {
            opacity: 0.8;
        }

    </style>
</head>
<body>
    <div class="container">
        <a href="../index.php" class="home-icon">
            <img src="../asset/icon-home.png" alt="Home">
        </a>

        <div class="positions">
            <a href="forward.php" class="position-button">
                <img src="../asset/forward.png" alt="Forward" class="position-image">
            </a>
            <a href="midfielder.php" class="position-button">
                <img src="../asset/midfielder.png" alt="Midfielder" class="position-image">
            </a>
            <a href="defender.php" class="position-button">
                <img src="../asset/defeder.png" alt="Defender" class="position-image">
            </a>
            <a href="goalkeeper.php" class="position-button">
                <img src="../asset/goalkeeper.png" alt="Goalkeeper" class="position-image">
            </a>
        </div>
    </div>
</body>
</html>

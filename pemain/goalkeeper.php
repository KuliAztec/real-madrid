<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goalkeeper</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            overflow: hidden;
        }

        .container {
            display: none;
            height: 100vh;
            color: white;
        }

        #goalkeeper-page {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            height: 100vh;
            background: url('../asset/area.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: center;
        }

        #biodata-page {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
            background: url('../asset/Background.jpg') no-repeat center center;
            background-size: cover;
        }

        h1 {
            font-size: 50px;
            font-weight: bold;
            margin-top: 1%;
            backdrop-filter: blur(8px);
            background: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
            max-width: 500px;
            background: transparent;
            border: 3px solid rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .header {
            display: flex;
            justify-content: space-between;
            width: 100%;
            padding: 10px 20px;
            position: absolute;
            top: 0;
        }

        .header img {
            width: 80px;
            height: 80px;
            cursor: pointer;
        }

        .players-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        gap: 120px;
        padding: 300px; 
        max-width: 1000px;
        margin-top: -185px;
        }


        .player-card {
            text-align: center;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.6);
            padding: 2px;
            border-radius: 20px;
            width: 160px;
            background: transparent;
            border: 3px solid rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
        }

        .player-card img {
            width: 100px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }

        .player-card p {
            margin: 10px 0 0;
        }

        .biodata-content {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .biodata-content img {
            width: 400px;
            height: 600px;
            border-radius: 10px;
            object-fit: cover;
        }

        .biodata-stats {
            background: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 40px;
            border-radius: 40px;
            text-align: left;
            width: 600px;
            border: 2px solid rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            font-size: 1.3rem;
        }

        .biodata-stats p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <!-- goalkeeper Page -->
    <div id="goalkeeper-page">
        <div class="header">
            <img src="../asset/icon-white-back.png" alt="Back" onclick="window.location.href='position.php'">
            <img src="../asset/icon-white-home.png" alt="Home" onclick="window.location.href='../index.php'">
        </div>
        <h1>Goalkeeper</h1>
        <div class="players-grid">
            <div class="player-card" onclick="showBiodata('Courtois', 1, 13, 10, 30, 1170, 30, 13)">
                <img src="../asset/pemain/depan/goalkeeper/courtois.png" alt="Courtois">
                <p>Courtois</p>
            </div>
            <div class="player-card" onclick="showBiodata('Lunin', 13, 5, 8, 12, 450, 2, 5)">
                <img src="../asset/pemain/depan/goalkeeper/lunin.png" alt="Lunin">
                <p>Lunin</p>
            </div>
        </div>
    </div>

    <!-- Biodata Page -->
    <div id="biodata-page" class="container">
        <div class="header">
            <img src="../asset/icon-white-back.png" alt="Back" onclick="showgoalkeeperPage()">
            <img src="../asset/icon-white-home.png" alt="Home" onclick="window.location.href='../index.php'">
        </div>
        <div class="biodata-content">
            <img id="player-image" src="" alt="Player">
            <div class="biodata-stats">
                <h2 id="player-name"></h2>
                <p><strong>Number:</strong> <span id="player-number"></span></p>
                <p><strong>Matches Played:</strong> <span id="matches-played"></span></p>
                <p><strong>Goals Conceded:</strong> <span id="goals"></span></p>
                <p><strong>Saves:</strong> <span id="saves"></span></p>
                <p><strong>Minutes Played:</strong> <span id="minutes-played"></span></p>
                <p><strong>Clean Sheets:</strong> <span id="shots"></span></p>
                <p><strong>Matches As Starter:</strong> <span id="strater"></span></p>
            </div>
        </div>
    </div>

    <script>
        function showBiodata(name, number, matches, goals, saves, minutes, shots, strater) {
            document.getElementById('goalkeeper-page').style.display = 'none';
            document.getElementById('biodata-page').style.display = 'flex';
            document.getElementById('player-image').src = `../asset/pemain/depan/goalkeeper/${name.toLowerCase().replace(' ', '')}.png`;
            document.getElementById('player-name').innerText = name;
            document.getElementById('player-number').innerText = number;
            document.getElementById('matches-played').innerText = matches;
            document.getElementById('goals').innerText = goals;
            document.getElementById('saves').innerText = saves;
            document.getElementById('minutes-played').innerText = minutes;
            document.getElementById('shots').innerText = shots;
            document.getElementById('strater').innerText = strater;
        }

        function showgoalkeeperPage() {
            document.getElementById('biodata-page').style.display = 'none';
            document.getElementById('goalkeeper-page').style.display = 'flex';
        }
    </script>

</body>
</html>

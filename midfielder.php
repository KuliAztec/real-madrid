<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midfielder</title>
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

        #midfielder-page {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            height: 100vh;
            background: url('asset/area.jpg') no-repeat center center;
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
            background: url('asset/Background.jpg') no-repeat center center;
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
        gap: 50px;
        padding: 150px; 
        max-width: 1000px;
        margin-top: -115px;
        }


        .player-card {
            text-align: center;
            cursor: pointer;
            background: rgba(0, 0, 0, 0.6);
            padding: 2px;
            border-radius: 20px;
            width: 130px;
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

    <!-- Midfielder Page -->
    <div id="midfielder-page">
        <div class="header">
            <img src="asset/icon-white-back.png" alt="Back" onclick="window.location.href='position.php'">
            <img src="asset/icon-white-home.png" alt="Home" onclick="window.location.href='index.php'">
        </div>
        <h1>Midfielder Players</h1>
        <div class="players-grid">
            <div class="player-card" onclick="showBiodata('Bellingham', 5, 14, 2, 2, 1205, 18, 23)">
                <img src="asset/pemain/depan/midfielder/Bellingham.png" alt="Bellingham">
                <p>Bellingham</p>
            </div>
            <div class="player-card" onclick="showBiodata('Camavinga', 6, 8, 0, 0, 521, 2, 17)">
                <img src="asset/pemain/depan/midfielder/Camavinga.png" alt="Camavinga">
                <p>Camavinga</p>
            </div>
            <div class="player-card" onclick="showBiodata('Valverde', 8, 18, 4, 1, 1527, 18, 9)">
                <img src="asset/pemain/depan/midfielder/Valverde.png" alt="Valverde">
                <p>Valverde</p>
            </div>
            <div class="player-card" onclick="showBiodata('Modrić', 10, 18, 0, 2, 801, 6, 6)">
                <img src="asset/pemain/depan/midfielder/Modrić.png" alt="Modrić">
                <p>Modrić</p>
            </div>
            <div class="player-card" onclick="showBiodata('Tchouaméni', 15, 14, 0, 0, 1146, 9, 11)">
                <img src="asset/pemain/depan/midfielder/Tchouaméni.png" alt="Tchouaméni">
                <p>Tchouaméni</p>
            </div>
            <div class="player-card" onclick="showBiodata('Arda', 15, 13, 0, 1, 381, 9, 13)">
                <img src="asset/pemain/depan/midfielder/Arda.png" alt="Arda">
                <p>Arda Güler</p>
            </div>
            <div class="player-card" onclick="showBiodata('Ceballos', 19, 7, 0, 0, 197, 0, 8)">
                <img src="asset/pemain/depan/midfielder/Ceballos.png" alt="Ceballos">
                <p>D. Ceballos</p>
            </div>
        </div>
    </div>

    <!-- Biodata Page -->
    <div id="biodata-page" class="container">
        <div class="header">
            <img src="asset/icon-white-back.png" alt="Back" onclick="showmidfielderPage()">
            <img src="asset/icon-white-home.png" alt="Home" onclick="window.location.href='index.php'">
        </div>
        <div class="biodata-content">
            <img id="player-image" src="" alt="Player">
            <div class="biodata-stats">
                <h2 id="player-name"></h2>
                <p><strong>Number:</strong> <span id="player-number"></span></p>
                <p><strong>Matches Played:</strong> <span id="matches-played"></span></p>
                <p><strong>Goals:</strong> <span id="goals"></span></p>
                <p><strong>Assists:</strong> <span id="assists"></span></p>
                <p><strong>Minutes Played:</strong> <span id="minutes-played"></span></p>
                <p><strong>Shots:</strong> <span id="shots"></span></p>
                <p><strong>Fouls Received:</strong> <span id="fouls-received"></span></p>
            </div>
        </div>
    </div>

    <script>
        function showBiodata(name, number, matches, goals, assists, minutes, shots, fouls) {
            document.getElementById('midfielder-page').style.display = 'none';
            document.getElementById('biodata-page').style.display = 'flex';
            document.getElementById('player-image').src = `asset/pemain/depan/midfielder/${name.toLowerCase().replace(' ', '')}.png`;
            document.getElementById('player-name').innerText = name;
            document.getElementById('player-number').innerText = number;
            document.getElementById('matches-played').innerText = matches;
            document.getElementById('goals').innerText = goals;
            document.getElementById('assists').innerText = assists;
            document.getElementById('minutes-played').innerText = minutes;
            document.getElementById('shots').innerText = shots;
            document.getElementById('fouls-received').innerText = fouls;
        }

        function showmidfielderPage() {
            document.getElementById('biodata-page').style.display = 'none';
            document.getElementById('midfielder-page').style.display = 'flex';
        }
    </script>

</body>
</html>

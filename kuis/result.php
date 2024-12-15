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

    // Retrieve the score from the URL
    $score = isset($_GET['score']) ? intval($_GET['score']) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: url('../asset/background-index.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            position: relative;
            width: 100%;
            max-width: 800px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        header {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            align-items: center;
        }

        .title {
            font-size: 38px;
            font-weight: bold;
            text-align: left;
            margin-left: 20px;
        }

        .home-icon {
            width: 80px;
            height: 80px;
            cursor: pointer;
        }

        .button {
            background-color: #000A25;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 30px;
            margin-bottom: 40%;
            border-radius: 50px;
            padding: 20px;
            width: 50%;
            justify-content: center;    
        } 
        
        .next, .back {
            background-color: #000A25;
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 20px;
            margin: 10px;
            transition: 0.3s;
        }

        .button:hover, .next:hover, .back:hover {
            background-color: rgba(255, 255, 255, 0.7);
            color: black;
        }

        .question-box {
            background-color: #000A25;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            border: 2px solid rgba(255, 255, 255, 0.8);
            margin-top: 50px;
        }

        .question-box p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .option {
            display: block;
            text-align: left;
            margin-bottom: 10px;
        }

        .option input {
            margin-right: 10px;
        }

        .navigation {
            margin-top: 20px;
        }

        .score-box { 
            display: flex;
            justify-content: space-around;
            align-items: center; 
            width: 100%; 
            height: 100%; 
            margin: 0 auto; 
        }

        .score-box div {
            background-color: #000A25;
            padding: 20px;
            border-radius: 10px;
            width: 40%;
            text-align: center;
        }
    </style>
</head>
<body>

    <!-- Halaman Skor -->
    <div class="container" id="scorePage">
        <header>
            <h1 class="title">SCORE</h1>
            <a href="../index.php">
                <img src="../asset/icon-white-home.png" alt="Home Icon" class="home-icon">
            </a>
        </header>
        <div class="score-box">
            <div>
                <h2>BENAR</h2>
                <p id="correct"><?php echo $score; ?></p>
            </div>
            <div>
                <h2>SALAH</h2>
                <p id="wrong"><?php echo 10 - $score; ?></p>
            </div>
        </div>
            
<script>
    // Navigasi tombol play
    document.getElementById('playButton').addEventListener('click', () => {
        window.location.href = 'question.php';
    });
</script>
</body>
</html>

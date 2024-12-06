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
            background: url('asset/background-index.jpg') no-repeat center center fixed;
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
            margin-top: 50px; /* Meningkatkan posisi ke atas */
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
    <!-- Halaman Awal -->
    <div class="container" id="page1">
        <header>
            <h1 class="title">GAMES</h1>
            <a href="home.php">
                <img src="asset/icon-white-home.png" alt="Home Icon" class="home-icon">
            </a>
        </header>
        <button class="button" onclick="goToPage(2)">PLAY</button>
    </div>

    <!-- Template untuk Halaman Soal -->
    <div class="container" id="page2" style="display: none;">
        <header>
            <h1 class="title">GAMES</h1>
            <a href="home.php">
                <img src="asset/icon-white-home.png" alt="Home Icon" class="home-icon">
            </a>
        </header>
        <div class="question-box">
            <p>1. Sepak bola berasal dari dua kata yakni sepak dan bola, sepak yang berarti...</p>
            <label class="option"><input type="radio" name="question1" value="wrong"> Menendang menggunakan kedua kaki</label>
            <label class="option"><input type="radio" name="question1" value="wrong"> Melayang di udara</label>
            <label class="option"><input type="radio" name="question1" value="correct"> Mendorong kaki</label>
            <label class="option"><input type="radio" name="question1" value="wrong"> Memukul bola</label>
        </div>
        <div class="navigation">
            <button class="back" onclick="goToPage(1)">BACK</button>
            <button class="next" onclick="goToPage(3)">NEXT</button>
        </div>
    </div>

    <div class="container" id="page3" style="display: none;">
        <header>
            <h1 class="title">GAMES</h1>
            <a href="home.php">
                <img src="asset/icon-white-home.png" alt="Home Icon" class="home-icon">
            </a>
        </header>
        <div class="question-box">
            <p>2. Siapa presiden Real Madrid?</p>
            <label class="option"><input type="radio" name="question2" value="wrong"> Martin Edwards</label>
            <label class="option"><input type="radio" name="question2" value="correct"> Florentino Perez</label>
            <label class="option"><input type="radio" name="question2" value="wrong"> Erick Thohir</label>
            <label class="option"><input type="radio" name="question2" value="wrong"> Lord Attenborough</label>
        </div>
        <div class="navigation">
            <button class="back" onclick="goToPage(2)">BACK</button>
            <button class="next" onclick="goToPage(4)">NEXT</button>
        </div>
    </div>

    <div class="container" id="page4" style="display: none;">
        <header>
            <h1 class="title">GAMES</h1>
            <a href="home.php">
                <img src="asset/icon-white-home.png" alt="Home Icon" class="home-icon">
            </a>
        </header>
        <div class="question-box">
            <p>3. Siapakah kiper utama Real Madrid dalam kemenangan Liga Champions 2022?</p>
            <label class="option"><input type="radio" name="question2" value="wrong"> Keylor Navas</label>
            <label class="option"><input type="radio" name="question2" value="correct"> Iker Casillas</label>
            <label class="option"><input type="radio" name="question2" value="wrong"> Thibaut Courtois</label>
            <label class="option"><input type="radio" name="question2" value="wrong"> Diego Lopez</label>
        </div>
        <div class="navigation">
            <button class="back" onclick="goToPage(3)">BACK</button>
            <button class="next" onclick="goToPage(5)">NEXT</button>
        </div>
    </div>

    <div class="container" id="page5" style="display: none;">
        <header>
            <h1 class="title">GAMES</h1>
            <a href="home.php">
                <img src="asset/icon-white-home.png" alt="Home Icon" class="home-icon">
            </a>
        </header>
        <div class="question-box">
            <p>4. Siapakah Pimpinan Pertama Real Madrid?</p>
            <label class="option"><input type="radio" name="question2" value="wrong"> Julian Palacios</label>
            <label class="option"><input type="radio" name="question2" value="correct"> Florentino Perez</label>
            <label class="option"><input type="radio" name="question2" value="wrong"> Thibaut Courtois</label>
            <label class="option"><input type="radio" name="question2" value="wrong"> Lord Attenborough</label>
        </div>
        <div class="navigation">
            <button class="back" onclick="goToPage(4)">BACK</button>
            <button class="next" onclick="goToPage(6)">NEXT</button>
        </div>
    </div>

    <div class="container" id="page6" style="display: none;">
        <header>
            <h1 class="title">GAMES</h1>
            <a href="home.php">
                <img src="asset/icon-white-home.png" alt="Home Icon" class="home-icon">
            </a>
        </header>
        <div class="question-box">
            <p>5. Apa nama Stadion Real Madrid?</p>
            <label class="option"><input type="radio" name="question2" value="wrong"> Old Trafford</label>
            <label class="option"><input type="radio" name="question2" value="correct"> Stamford Bridge</label>
            <label class="option"><input type="radio" name="question2" value="wrong"> Olimpiade Lluis Companys</label>
            <label class="option"><input type="radio" name="question2" value="wrong"> Santiago Bernabeu</label>
        </div>
        <div class="navigation">
            <button class="back" onclick="goToPage(5)">BACK</button>
            <button class="next" onclick="goToPage('scorePage')">NEXT</button>
        </div>
    </div>

    <!-- Halaman Skor -->
    <div class="container" id="scorePage" style="display: none;">
        <header>
            <h1 class="title">SCORE</h1>
            <a href="home.php">
                <img src="asset/icon-white-home.png" alt="Home Icon" class="home-icon">
            </a>
        </header>
        <div class="score-box">
            <div>
                <h2>BENAR</h2>
                <p id="correct">0</p>
            </div>
            <div>
                <h2>SALAH</h2>
                <p id="wrong">0</p>
            </div>
        </div>
            
        <script>
    function goToPage(page) {
        // Sembunyikan semua halaman
        const pages = document.querySelectorAll('.container');
        pages.forEach(p => p.style.display = 'none');

        // Jika halaman tujuan adalah scorePage
        if (page === 'scorePage') {
            // Hitung jumlah jawaban benar dan salah
            const inputs = document.querySelectorAll('input[type="radio"]:checked');
            let correct = 0;
            let wrong = 0;

            inputs.forEach(input => {
                if (input.value === "correct") {
                    correct++;
                } else {
                    wrong++;
                }
            });

            // Update nilai pada elemen skor
            document.getElementById('correct').innerText = correct;
            document.getElementById('wrong').innerText = wrong;

            // Tampilkan halaman skor
            document.getElementById('scorePage').style.display = 'flex';
        } else {
            // Tampilkan halaman sesuai parameter
            document.getElementById(`page${page}`).style.display = 'flex';
        }
    }
</script>

</body>
</html>

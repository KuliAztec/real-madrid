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
            background: url('asset/background-history.png') no-repeat center center/cover;
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
            <a href="index.php">
                <img src="asset/icon-white-home.png" alt="Home Icon" class="home-icon">
            </a>
        </header>

        <!-- Main Content -->
        <main>
            <div class="content">
                <p>
                    Olahraga baru dari Inggris bernama sepak bola mulai merambah negara kita. Penerapannya yang cepat berarti bahwa pada akhir abad ke-19 dan awal abad ke-20, organisasi-organisasi pertama dibentuk untuk mempraktikkannya. Salah satunya adalah Madrid Football Club, pendahulu Real Madrid. Julián Palacios adalah pemimpin pertamanya, tetapi Juan Padrós-lah yang secara resmi membentuk lembaga tersebut (1902). Minat tumbuh sedemikian rupa sehingga Madrid mengusulkan diadakannya turnamen sebagai penghormatan kepada raja Alfonso XIII. Inisiatif ini menjadi Copa de España.
                </p>
            </div>
        </main>

        <!-- Year -->
        <div class="year">1902-1910</div>

        <!-- Footer -->
        <footer>
            <button class="nav-button prev-button"><</button>
            <button class="nav-button next-button">></button>
        </footer>
    </div>

    <script>
        // Navigasi tombol prev dan next
        document.querySelector('.prev-button').addEventListener('click', () => {
            window.location.href = 'history.php';
        });

        document.querySelector('.next-button').addEventListener('click', () => {
            window.location.href = 'history-next.php';
        });
    </script>
</body>
</html>

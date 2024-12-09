<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players - First Team</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('asset/background-players.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
            display: flex;
            color: white;
        }

        .container {
            display: flex;
            justify-content: flex-end; 
            align-items: center;
            width: 100%;
            height: 100%;
            padding-right: 10%; 
        }

        .content {
            text-align: right;
            text-shadow: 4px 4px 15px rgba(0, 0, 0, 1); 
        }

        .content h1 {
            font-size: 4rem;
            letter-spacing: 0.2rem;
            margin: 0;
        }

        .content h2 {
            font-size: 2rem;
            font-weight: normal;
            letter-spacing: 0.1rem;
            margin: 0;
        }

        .content h1 a {
            text-decoration: none; 
            color: white; 
            transition: color 0.3s ease;
        }

        .content h1 a:hover {
            color: #FFD700; 
        }

        body {
            transition: opacity 0.5s ease;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>
                <a href="position.php">PLAYERS</a> 
            </h1>
            <h2>FIRST TEAM</h2>
        </div>
    </div>

    <script>
        const links = document.querySelectorAll('a');
        links.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault(); 
                document.body.style.opacity = '0'; 
                setTimeout(() => {
                    window.location.href = link.href; 
                }, 500);
            });
        });
    </script>
</body>
</html>

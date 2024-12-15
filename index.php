<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: tampilan-depan.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Real Madrid</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      body {
        margin: 0;
        padding: 0;
        background-image: url("asset/background-index.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh;
        color: white;
      }

      .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 40px;
        background-color: rgba(26, 26, 72, 0.95);
        box-shadow: 0 2px 4px rgba(20, 38, 59, 0.3);
      }

      .logo h1 {
        font-size: 24px;
        font-weight: bold;
        color: white;
        letter-spacing: 2px;
      }

      .logo h1 span {
        color: rgb(255, 215, 0);
      }

      .menu {
        display: flex;
        gap: 35px;
      }

      .menu a {
        text-decoration: none;
        color: rgb(233, 233, 238);
        font-size: 18px;
        font-weight: bold;
        transition: color 0.3s ease;
      }

      .menu a:hover {
        color: #ffd700;
      }

      .hero {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        height: calc(100vh - 80px);
      }

      .hero-title {
        display: flex;
        align-items: center;
        gap: 20px;
      }

      .hero-title img {
        width: 200px;
        position: relative;
        top: -50px;
      }

      .hero-title h1 {
        font-size: 80px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      }

      .hero-title h1 span {
        color: #ffd700;
      }

      .hero-subtitle {
        top: -110px;
        position: relative;
        font-size: 40px;
        font-weight: 300;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        text-align: center;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      }
    </style>
  </head>
  <body>
    <div class="navbar">
      <div class="logo">
        <h1>REAL <span>MADRID</span></h1>
      </div>
      <div class="menu">
        <a href="index.php">HOME</a>
        <a href="sejarah/history.php">HISTORY</a>
        <a href="pemain/players.php">PLAYERS</a>
        <a href="kuis/game.php">GAMES</a>
        <a href="autentikasi/logout.php">LOGOUT</a> 
      </div>
    </div>
    <div class="hero">
      <div class="hero-title">
        <h1>HALA</h1>
        <img src="asset/logo-rm2.png" alt="Real Madrid Logo" />
        <h1>MADRID</h1>
      </div>
      <p class="hero-subtitle">THE FUTURE IS HERE</p>
    </div>
  </body>
</html>

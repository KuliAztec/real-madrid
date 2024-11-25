<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
    <style>
            * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        border: none;
        outline: none;
        text-decoration: none;
        font-family: "Poppins";
      }
      body {
        margin: 0;
        padding: 0;
        background-image: url("asset/background-index.png"); 
        background-size: cover; 
        background-position: center;
        background-repeat: no-repeat;
        height: 100vh; 
      }
      .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 20px;
        box-shadow: 0 2px 4px rgba(20, 38, 59, 0.3);
        background-color: rgb(26, 26, 72);
        opacity: 0.95;
      }

      .logo h1 {
        font-size: 24px;
        font-weight: bold;
        margin: 0;
        color: white;
        letter-spacing: 2px;
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
    </style>
  </head>
  <body>
  <div class="navbar">
      <div class="logo">
        <h1>REAL <span>MADRID</span></h1>
      </div>
      <div class="menu">
        <a href="#">HOME</a>
        <a href="#">HISTORY</a>
        <a href="#">PLAYERS</a>
        <a href="#">GAMES</a>
      </div>
    </div>
  </body>
</html>

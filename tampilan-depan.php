<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animasi Tampilan Depan</title>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <style>
    body, html {
      margin: 0;
      padding: 0;
      overflow: hidden;
      background: url('asset/tampilan-depan.png') no-repeat;
      background-size: cover;
      font-size: 32px;
      font-weight: 600;
      font-family: 'Poppins';
    }

    .background {
      position: relative;
      width: 100vw;
      height: 100vh;
    }

    .hole {
      position: absolute;
      bottom: 10%;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 0;
      background-color: black;
      border-radius: 50% / 25%;
      z-index: 1;
      animation: expandHole 2s forwards, shrinkHole 2s 2s forwards;
    }

    .bola {
      position: absolute;
      width: 50px;
      bottom: 20%;
      left: 50%;
      transform: translate(-50%, 100%);
      opacity: 0;
      animation: bolaMove 3s forwards ease-in-out;
      z-index: 2;
    }

    .login-text {
      position: absolute;
      bottom: 23%;
      left: 44%;
      color: white;
      text-align: center;
      opacity: 0;
      cursor: pointer;
      animation: showText 2s forwards ease-in-out;
      animation-delay: 2s;
    }

    /* Animations */
    @keyframes expandHole {
      0% {
        width: 0;
        height: 0;
      }
      100% {
        width: 150px;
        height: 75px;
      }
    }

    @keyframes shrinkHole {
      0% {
        width: 150px;
        height: 75px;
        opacity: 1;
      }
      100% {
        width: 0;
        height: 0;
        opacity: 0;
      }
    }

    @keyframes bolaMove {
      0% {
        transform: translate(-50%, 100%);
        opacity: 0;
      }
      25% {
        transform: translate(-50%, 0);
        opacity: 1;
      }
      50% {
        transform: translate(-50%, -50px);
        opacity: 1;
      }
      100% {
        transform: translate(-140px, -50px);
        opacity: 1;
      }
}


    @keyframes showText {
    0% {
      opacity: 0.1;
      transform: translateX(10%); /* Mulai dari luar layar sebelah kanan */
      }
    100% {
      opacity: 1;
      transform: translateX(0); /* Posisi normal */
  }
}
  </style>
</head>
<body>
  <div class="background">
    <div class="hole"></div>
    <img src="asset/bola.png" alt="bola" class="bola">
    <p class="login-text" onclick="redirectToLogin()">Press to Login</p>
  </div>

  <script>
    function redirectToLogin() {
      window.location.href = "login.php";
    }
  </script>
</body>
</html>

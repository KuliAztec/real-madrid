<?php
  // Create connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "realmadrid";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
      die("Cek Connection " .$conn->connect_error);
  }
?>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
  
      $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
      $result = mysqli_query($conn, $query);
  
      if (mysqli_num_rows($result) == 1) {
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $email;
          echo "Login successful!";
          // Redirect
          header("Location: home.php");
          exit;
      } else {
          echo "Invalid email or password.";
      }
  }
?>



<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIGN IN FORM</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap");

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        border: none;
        outline: none;
        text-decoration: none;
        font-family: "Poppins", sans-serif;
      }

      body {
        height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: url(asset/Background.jpg);
        background-size: cover;
        background-position: center;
        transition: opacity 0.3s ease-in-out;
      }

      .container {
        position: relative;
        width: 100%;
        max-width: 400px;
        height: 500px;
        background: transparent;
        border-radius: 20px;
        border: 3px solid rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(8px);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
      }

      .main-box {
        padding: 50px;
        width: 100%;
      }

      .main-box h1 {
        text-align: center;
        font-size: 40px;
        font-weight: 700;
        color: #ffffff;
      }

      .input-box {
        position: relative;
        height: 55px;
        width: 100%;
        border-bottom: 2px solid #ffffff;
        margin: 32px 0;
      }

      .input-box label {
        position: absolute;
        top: 50%;
        left: 6px;
        transform: translateY(-50%);
        pointer-events: none;
        color: #ffffff;
        font-weight: 500;
        font-size: 17px;
        transition: all ease 0.4s;
      }

      .input-box input {
        height: 100%;
        width: 100%;
        background-color: transparent;
        font-size: 15px;
        font-weight: 600;
        color: #ffffff;
        padding: 0 30px 0 6px;
      }

      .input-box .icon {
        position: absolute;
        right: 10px;
        margin-top: 10px;
        font-size: 15px;
        color: #ffffff;
      }

      .input-box input:focus ~ label,
      .input-box input:valid ~ label {
        top: -3px;
      }

      .check {
        color: #ffffff;
        font-size: 15px;
        font-weight: 500;
        margin: -10px 0 15px;
        display: flex;
        justify-content: space-between;
      }

      .check label input {
        vertical-align: middle;
        margin-right: 6px;
        accent-color: #ffffff;
      }

      .btn {
        width: 250px;
        height: 45px;
        background-color: #ffffff;
        border-radius: 30px;
        font-size: 15px;
        font-weight: 600;
        color: #020202;
        margin-top: 10px;
        cursor: pointer;
        align: center;
      }

      .register {
        text-align: center;
        color: #ffffff;
        font-size: 15px;
        font-weight: 500;
        margin: 35px 0 10px;
      }

      .register p a {
        font-size: 15px;
        font-weight: 600;
        color: #ffffff;
        margin-left: 5px;
      }

      .register p a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="main-box">
        <h1>Log In</h1>
        <form action="login.php" method="post">
          <div class="input-box">
            <span class="icon"><i data-feather="mail"></i></span>
            <input type="email" name="email" required />
            <label>Email</label>
          </div>
          <div class="input-box">
            <span class="icon"><i data-feather="lock"></i></span>
            <input type="password" name="password" required />
            <label>Password</label>
          </div>
          <div class="check">
            <label><input type="checkbox" /> Remember me</label>
          </div>
          <button type="submit" class="btn">Login</button>
          <div class="register">
            <p>
              Don't have an account?
              <a href="register.php" class="register-link">Register!</a>
            </p>
          </div>
        </form>
      </div>
    </div>
    <script>
      const links = document.querySelectorAll("a");
      links.forEach((link) => {
        link.addEventListener("click", (e) => {
          e.preventDefault();
          const href = link.getAttribute("href");

          document.body.style.opacity = 0;

          setTimeout(() => {
            window.location.href = href;
          }, 300);
        });
      });
    </script>
  </body>
</html>

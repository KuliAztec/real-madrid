<?php
include '../koneksyon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nama_manager']) && isset($_POST['password'])) {
    $username = $_POST['nama_manager'];
    $password = $_POST['password'];

    $query = "SELECT * FROM manager WHERE nama_manager = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        echo "Login successful!";
        // Redirect
        header("Location: ../players/squad.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <label for="nama_manager">Username:</label>
        <input type="text" id="nama_manager" name="nama_manager" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>

    <a href="../index.php">Back to Index</a>
</body>
</html>
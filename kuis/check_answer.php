<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "realmadrid";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_POST['id_quiz']);
$user_answer = $_POST['answer'];

$sql_check = "SELECT answer FROM quiz WHERE id_quiz = $id";
$result_check = $conn->query($sql_check);

$response = array('correct' => false);

if ($result_check->num_rows > 0 && $user_answer === $result_check->fetch_assoc()['answer']) {
    $response['correct'] = true;
    $score++;
}

echo json_encode($response);

$conn->close();
?>
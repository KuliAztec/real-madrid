<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "realmadrid";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $question = $_POST['question'];
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        $opt3 = $_POST['opt3'];
        $opt4 = $_POST['opt4'];
        $answer = $_POST['answer'];

        $sql_create = "INSERT INTO quiz (question, opt1, opt2, opt3, opt4, answer) VALUES ('$question', '$opt1', '$opt2', '$opt3', '$opt4', '$answer')";
        $conn->query($sql_create);
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $question = $_POST['question'];
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        $opt3 = $_POST['opt3'];
        $opt4 = $_POST['opt4'];
        $answer = $_POST['answer'];

        $sql_update = "UPDATE quiz SET question='$question', opt1='$opt1', opt2='$opt2', opt3='$opt3', opt4='$opt4', answer='$answer' WHERE id_quiz=$id";
        $conn->query($sql_update);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];

        $sql_delete = "DELETE FROM quiz WHERE id_quiz=$id";
        $conn->query($sql_delete);
    }
}

// Handle edit button logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    $id = $_POST['id'];
    $sql_edit = "SELECT question, opt1, opt2, opt3, opt4, answer FROM quiz WHERE id_quiz = $id";
    $result_edit = $conn->query($sql_edit);

    if ($result_edit->num_rows > 0) {
        $row_edit = $result_edit->fetch_assoc();
        $edit_id = $id;
        $edit_question = $row_edit['question'];
        $edit_opt1 = $row_edit['opt1'];
        $edit_opt2 = $row_edit['opt2'];
        $edit_opt3 = $row_edit['opt3'];
        $edit_opt4 = $row_edit['opt4'];
        $edit_answer = $row_edit['answer'];
    }
}

// Fetch all questions
$sql_fetch = "SELECT id_quiz, question, opt1, opt2, opt3, opt4, answer FROM quiz";
$result_fetch = $conn->query($sql_fetch);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
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
            background-color: rgba(0, 10, 37, 0.8);
            padding: 20px;
            border-radius: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        label {
            text-align: left;
            margin-left: 10px;
        }

        input[type="text"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
        }

        button {
            background-color: #000A25;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        button:hover {
            background-color: rgba(255, 255, 255, 0.7);
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid white;
            text-align: center;
        }

        th {
            background-color: #000A25;
        }

        td {
            background-color: rgba(0, 10, 37, 0.8);
        }

        .actions button {
            margin: 0 5px;
        }

        .back-button {
            background-color: #0582CA;
            color: #051923;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.7);
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1 class="title">CRUD Operations</h1>
            <a href="game.php">
                <button class="back-button">Back to Game</button>
            </a>
        </header>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo isset($edit_id) ? $edit_id : ''; ?>">
            <label for="question">Question:</label>
            <input type="text" name="question" id="question" value="<?php echo isset($edit_question) ? htmlspecialchars($edit_question) : ''; ?>" required>
            <label for="opt1">Option 1:</label>
            <input type="text" name="opt1" id="opt1" value="<?php echo isset($edit_opt1) ? htmlspecialchars($edit_opt1) : ''; ?>" required>
            <label for="opt2">Option 2:</label>
            <input type="text" name="opt2" id="opt2" value="<?php echo isset($edit_opt2) ? htmlspecialchars($edit_opt2) : ''; ?>" required>
            <label for="opt3">Option 3:</label>
            <input type="text" name="opt3" id="opt3" value="<?php echo isset($edit_opt3) ? htmlspecialchars($edit_opt3) : ''; ?>" required>
            <label for="opt4">Option 4:</label>
            <input type="text" name="opt4" id="opt4" value="<?php echo isset($edit_opt4) ? htmlspecialchars($edit_opt4) : ''; ?>" required>
            <label for="answer">Answer:</label>
            <input type="text" name="answer" id="answer" value="<?php echo isset($edit_answer) ? htmlspecialchars($edit_answer) : ''; ?>" required>
            <button type="submit" name="create">Create</button>
            <button type="submit" name="update">Update</button>
            <button type="submit" name="delete">Delete</button>
        </form>

        <!-- Display existing questions -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Question</th>
                    <th>Option 1</th>
                    <th>Option 2</th>
                    <th>Option 3</th>
                    <th>Option 4</th>
                    <th>Answer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result_fetch->num_rows > 0) {
                    while ($row = $result_fetch->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id_quiz']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['question']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['opt1']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['opt2']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['opt3']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['opt4']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['answer']) . "</td>";
                        echo "<td class='actions'>
                                <form method='POST' action='' style='display:inline;'>
                                    <input type='hidden' name='id' value='" . htmlspecialchars($row['id_quiz']) . "'>
                                    <button type='submit' name='edit'>Edit</button>
                                    <button type='submit' name='delete'>Delete</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No questions found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
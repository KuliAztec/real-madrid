<?php
    $servername = "localhost";
    $username = "ifunsoed_realmadrid";
    $password = "";
    $dbname = "ifunsoed_realmadrid";
    
    // Membuat koneksi
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    session_start();

    // Retrieve the id from the URL, default to 0 if not set
    $idnow = isset($_GET['id']) ? intval($_GET['id']) : 1;

    // Retrieve the score from the URL, default to 0 if not set
    $score = isset($_GET['score']) ? intval($_GET['score']) : 0;

    // Initialize encountered questions array in session if not already set
    if (!isset($_SESSION['encountered_questions'])) {
        $_SESSION['encountered_questions'] = [];
    }

    // Handle back button logic
    if (isset($_GET['action']) && $_GET['action'] === 'back') {
        array_pop($_SESSION['encountered_questions']);
        $idnow = max(1, $idnow - 1);
        $score = max(0, $score - 1); // Decrease score by 1
        header("Location: question.php?id=$idnow&score=$score");
        exit();
    }

    // Handle home button logic
    if (isset($_GET['action']) && $_GET['action'] === 'home') {
        $_SESSION['encountered_questions'] = [];
        header("Location: ../index.php");
        exit();
    }

    // Check if 10 questions have been answered
    if (count($_SESSION['encountered_questions']) >= 10) {
        header("Location: result.php?score=$score");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_answer = $_POST['option'] ?? '';
        $idnow = intval($_POST['id']);
        $score = intval($_POST['score']);

        $sql_check = "SELECT answer FROM quiz WHERE id_quiz = $idnow";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            $row_check = $result_check->fetch_assoc();
            if ($user_answer === $row_check['answer']) {
                $score++;
                $result_message = "Correct!";
            } else {
                $result_message = "Incorrect!";
            }
        }

        // Add current question ID to encountered questions
        $_SESSION['encountered_questions'][] = $idnow;

        // Redirect to the next question
        $newId = $idnow + 1;
        header("Location: question.php?id=$newId&score=$score");
        exit();
    }
?>

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

    <!-- Template untuk Halaman Soal -->
    <div class="container" id="page2">
        <header>
            <h1 class="title">GAMES</h1>
            <a href="question.php?action=home">
                <img src="../asset/icon-white-home.png" alt="Home Icon" class="home-icon">
            </a>
        </header>
        <div class="question-box"> <!-- Corrected opening div tag -->

        <!-- Menampilkan pertanyaan -->
            <?php
                // Retrieve a random question excluding encountered ones
                if (empty($_SESSION['encountered_questions'])) {
                    $sql = "SELECT id_quiz, question FROM quiz ORDER BY RAND() LIMIT 1";
                } else {
                    $encountered_ids = implode(',', $_SESSION['encountered_questions']);
                    $sql = "SELECT id_quiz, question FROM quiz WHERE id_quiz NOT IN ($encountered_ids) ORDER BY RAND() LIMIT 1";
                }

                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    // Mengambil data dari hasil query
                    $row = $result->fetch_assoc();
                    $idnow = $row['id_quiz'];
                    $paragraf = $row['question'];
                    echo "<p>" . htmlspecialchars($paragraf) . "</p>"; // Menampilkan pertanyaan
                } else {
                    echo "Tidak ada data ditemukan.";
                }
            ?>

            <!-- Menampilkan opsi -->
            <form id="quizForm" method="POST" action="">
            <?php
            if (isset($idnow)) {
                $sql_options = "SELECT opt1,opt2,opt3,opt4 FROM quiz WHERE id_quiz = $idnow";
                $result_options = $conn->query($sql_options);

                if ($result_options->num_rows > 0) {
                    while($row_option = $result_options->fetch_assoc()) {
                        echo '<div class="option">';
                        echo '<input type="radio" name="option" value="' . htmlspecialchars($row_option['opt1']) . '">';
                        echo '<label>' . htmlspecialchars($row_option['opt1']) . '</label>';
                        echo '</div>';

                        echo '<div class="option">';
                        echo '<input type="radio" name="option" value="' . htmlspecialchars($row_option['opt2']) . '">';
                        echo '<label>' . htmlspecialchars($row_option['opt2']) . '</label>';
                        echo '</div>';

                        echo '<div class="option">';
                        echo '<input type="radio" name="option" value="' . htmlspecialchars($row_option['opt3']) . '">';
                        echo '<label>' . htmlspecialchars($row_option['opt3']) . '</label>';
                        echo '</div>';

                        echo '<div class="option">';
                        echo '<input type="radio" name="option" value="' . htmlspecialchars($row_option['opt4']) . '">';
                        echo '<label>' . htmlspecialchars($row_option['opt4']) . '</label>';
                        echo '</div>';
                    }
                }
            }
            ?>
            <input type="hidden" name="id" value="<?php echo $idnow; ?>">
            <input type="hidden" name="score" value="<?php echo $score; ?>">
            </form>

            <?php
            if (isset($result_message)) {
                echo "<div id='result'>$result_message</div>";
            }
            ?>
        </div>
        <div class="navigation">
            <button class="back">BACK</button>
            <button class="next">NEXT</button>
        </div>
    </div>

<script>
    // Navigasi tombol back
    document.querySelector('.back').addEventListener('click', () => {
        window.location.href = `question.php?id=<?php echo $idnow; ?>&score=<?php echo $score; ?>&action=back`;
    });

    // Navigasi tombol next
    document.querySelector('.next').addEventListener('click', () => {
        document.getElementById('quizForm').submit();
    });
</script>
</body>
</html>

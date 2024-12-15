<?php
session_start();

$servername = "localhost";
$username = "ifunsoed_realmadrid";
$password = "";
$dbname = "ifunsoed_realmadrid";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Assuming user ID is stored in session
$userId = isset($_SESSION['id_user']) ? intval($_SESSION['id_user']) : 0;
$userRole = '';

if ($userId > 0) {
    $sql = "SELECT role FROM user WHERE id_user = $userId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $userRole = $result->fetch_assoc()['role'];
    }
}

// Redirect if the user is not a manager
if ($userRole !== 'manager') {
    header("Location: history-1920.php");
    exit();
}

function createSejarah($conn, $isi, $tahun) {
    $stmt = $conn->prepare("INSERT INTO sejarah (isi, tahun) VALUES (?, ?)");
    $stmt->bind_param("ss", $isi, $tahun);
    $stmt->execute();
    $stmt->close();
}

function readSejarah($conn) {
    $result = $conn->query("SELECT * FROM sejarah");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function updateSejarah($conn, $id, $isi, $tahun) {
    $stmt = $conn->prepare("UPDATE sejarah SET isi = ?, tahun = ? WHERE id_sejarah = ?");
    $stmt->bind_param("ssi", $isi, $tahun, $id);
    $stmt->execute();
    $stmt->close();
}

function deleteSejarah($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM sejarah WHERE id_sejarah = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

$editData = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        createSejarah($conn, $_POST['isi'], $_POST['tahun']);
    } elseif (isset($_POST['update'])) {
        updateSejarah($conn, $_POST['id_sejarah'], $_POST['isi'], $_POST['tahun']);
    } elseif (isset($_POST['delete'])) {
        deleteSejarah($conn, $_POST['id_sejarah']);
    } elseif (isset($_POST['edit'])) {
        $editData = [
            'id_sejarah' => $_POST['id_sejarah'],
            'isi' => $_POST['isi'],
            'tahun' => $_POST['tahun']
        ];
    }
}

$sejarahData = readSejarah($conn);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Sejarah</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <style>
        body, html {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group textarea,
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }

        .sejarah-list {
            margin-top: 20px;
        }

        .sejarah-item {
            border-bottom: 1px solid #ccc;
            padding: 10px 0;
        }

        .sejarah-item strong {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .sejarah-item p {
            color: #555;
        }

        .sejarah-item form {
            display: inline;
        }

        .sejarah-item form button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .sejarah-item form button:hover {
            background-color: #0056b3;
        }

        .sejarah-item form button.delete {
            background-color: #dc3545;
        }

        .sejarah-item form button.delete:hover {
            background-color: #c82333;
        }

        a {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CRUD Sejarah</h1>
        <a href="history-1920.php">Kembali</a>
        <form method="POST">
            <input type="hidden" name="id_sejarah" value="<?php echo $editData ? $editData['id_sejarah'] : ''; ?>">
            <div class="form-group">
                <label for="isi">Isi:</label>
                <textarea name="isi" id="isi" required><?php echo $editData ? htmlspecialchars($editData['isi']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun:</label>
                <input type="text" name="tahun" id="tahun" required value="<?php echo $editData ? htmlspecialchars($editData['tahun']) : ''; ?>">
            </div>
            <div class="form-group">
                <button type="submit" name="<?php echo $editData ? 'update' : 'create'; ?>"><?php echo $editData ? 'Update' : 'Create'; ?></button>
                <?php if ($editData): ?>
                    <button type="submit" name="cancel">Cancel</button>
                <?php endif; ?>
            </div>
        </form>

        <h2>Sejarah List</h2>
        <div class="sejarah-list">
            <?php foreach ($sejarahData as $sejarah): ?>
                <div class="sejarah-item">
                    <strong><?php echo htmlspecialchars($sejarah['tahun']); ?></strong>
                    <p><?php echo htmlspecialchars($sejarah['isi']); ?></p>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id_sejarah" value="<?php echo $sejarah['id_sejarah']; ?>">
                        <input type="hidden" name="isi" value="<?php echo htmlspecialchars($sejarah['isi']); ?>">
                        <input type="hidden" name="tahun" value="<?php echo htmlspecialchars($sejarah['tahun']); ?>">
                        <button type="submit" name="edit">Edit</button>
                    </form>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id_sejarah" value="<?php echo $sejarah['id_sejarah']; ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
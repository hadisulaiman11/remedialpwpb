<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../apalj/index.php");
    exit();
}

include '../proses/db.php';

// Mengambil data user dari database
$query = "SELECT * FROM user";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/atmin.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">Admin</div>
        <div>
            <a href="../proses/logout.php" class="logout">Logout</a>
        </div>
    </nav>

    <div class="container">
        <h2>Tambah Data</h2>
        <form action="../proses/process_tambah.php" method="post">
            <div class="label">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="label">
                <label for="email">Email:</label>
                <input type="email" id="gmail" name="gmail" required>
            </div>

            <div class="label">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="label">
                <label for="role">Role:</label>
                <select name="role" id="role" required>
                    <option value="user">User </option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <button type="submit">Submit</button>
            <a href="index.php" class="back-link">Kembali</a>
        </form>
    </div>
</body>
</html>
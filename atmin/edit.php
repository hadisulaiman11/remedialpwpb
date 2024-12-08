<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../apalj/index.php");
    exit();
}

include '../proses/db.php';

// Memeriksa apakah ID pengguna ada di URL
if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']); // Mengambil ID dari URL dan mengonversinya menjadi integer

    // Mengambil data user berdasarkan ID
    $query = "SELECT * FROM user WHERE id = $user_id";
    $result = mysqli_query($config, $query);

    // Memeriksa apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak valid.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
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
        <h2>Edit Data</h2>
        <form action="proses_edit.php?id=<?php echo $user['id']; ?>" method="post">
            <div class="label">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
            </div>

            <div class="label">
                <label for="email">Email:</label>
                <input type="email" id="gmail" name="gmail" value="<?php echo htmlspecialchars($user['gmail']); ?>" required>
            </div>

            <div class="label">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah" required>
            </div>

            <div class="label">
                <label for="role">Role:</label>
                <select name="role" id="role" required>
                    <option value="user" <?php echo ($user['role'] == 'user') ? 'selected' : ''; ?>>User </option>
                    <option value="admin" <?php echo ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                </select>
            </div>

            <button type="submit">Submit</button>
            <a href="index.php" class="back-link">Kembali</a>
        </form>
    </div>
</body>
</html>
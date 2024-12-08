<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../apalj/index.php");
    exit();
}

include '../proses/db.php';

// Mengambil data user dari database
$query = "SELECT * FROM user";
$result = mysqli_query($config, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/atmin.css?v=<?php echo time(); ?>">
</head>
<body>
    <nav class="navbar">
        <div class="logo">Admin</div>
        <div>
            <a href="../proses/logout.php" class="logout">Logout</a>
        </div>
    </nav>

    <div class="container">
        <h2>Data Admin</h2>
        <a href="tambah.php" class="btn add-button">Tambah Data</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Memeriksa apakah ada data yang ditemukan
                if (mysqli_num_rows($result) > 0) {
                    // Mengambil setiap baris data
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gmail']) . "</td>";
                        echo "<td>
                                <a href='edit.php?id=" . htmlspecialchars($row['id']) . "' class='btn edit-button'>Edit</a>
                                <form action='../proses/process_hapus.php' method='post' style='display:inline;'>
                                    <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                                    <button type='submit' class='btn delete-button' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?');\">Hapus</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Tidak ada data ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
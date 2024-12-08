<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../apalj/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/user.css">
  <title>Document</title>
</head>
<body>
  <div class="container mt-5">
        <h1>User Dashboard</h1>
        <p>Selamat datang</p>
        <a href="../proses/logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
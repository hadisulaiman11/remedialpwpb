<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gmail = $_POST['gmail'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE gmail='$gmail' AND password='$password'";
    $result = mysqli_query($config, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        // Set cookie untuk 1 hari
        setcookie("user_id", $user['id'], time() + (86400), "/"); // 86400 = 1 hari

        if ($user['role'] == 'user') {
            header("Location: ../user/index.php");
        } elseif ($user['role'] == 'admin') {
            header("Location: ../atmin/index.php");
        }
    } else {
        echo "Login gagal. Periksa email dan password Anda.";
    }
}
?>